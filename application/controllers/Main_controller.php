<?php
	class Main_controller extends CI_Controller {
		public function __construct()
	    {
	        parent::__construct();
	        $this->load->database();
	        $this->load->helper(array('form','url'));
	        $this->load->model('main_model');
					date_default_timezone_set("Asia/Bangkok");
	    }
		public function index(){
			$this->load->view('vw_login');
		}
		public function error_page(){
			$this->load->view('vw_alert_404');
		}
		public function dashboard(){
			if ($this->session->level == 1){
				$data['event'] = $this->main_model->getAllEvent();
				$data['tahun_ak'] = $this->main_model->getAkademik();
				$data['mahasiswa'] = $this->main_model->getMahasiswa();
				$data['dosen'] = $this->main_model->getDosen();
				$data['matkul'] = $this->main_model->getMK();
				$data['prodi'] = $this->main_model->getProdi();
				$data['main_sidebar'] = 'sb_admin';
				$data['main_content'] = 'vw_dashboard_home';
				$this->load->view('vw_dashboard',$data);
			}else if($this->session->level == 2){
				$data['event'] = $this->main_model->getAllEvent();
				$data['jadwal_master'] = $this->main_model->getJadwalDsn_master();
				$data['jum_mhs'] = $this->main_model->getMhsByDosen();
				$data['jadwal'] = $this->main_model->getJdwlByDosen();
				$data['main_sidebar'] = 'sb_dsn';
				$data['main_content'] = 'vw_dashboard_dsn';
				$this->load->view('vw_dashboard',$data);
			}else if($this->session->level == 3){
				$data['event'] = $this->main_model->getAllEvent();
				$data['jumsks'] = $this->main_model->getJumlahSKSMHS();
				$data['jadwal'] = $this->main_model->getJadwalMhs_master();
				$data['pert'] = $this->main_model->getJdwlByMHS();
				$data['main_sidebar'] = 'sb_mhs';
				$data['main_content'] = 'vw_dashboard_mhs';
				$this->load->view('vw_dashboard',$data);
			}else{
				redirect('main_controller/index','refresh');
			}
		}
		public function do_upload(){
		  $path = './uploads/'.$this->session->level.'/'.$this->session->kode_user;
		  if (!is_dir($path)) {
		    mkdir($path,0755,TRUE);
		  }

		  $config['upload_path']          = $path;
		  $config['allowed_types']        = 'gif|jpg|png';
		  $config['max_size']             = 0;
		  $config['max_width']            = 1024;
		  $config['max_height']           = 768;

		  $this->load->library('upload', $config);

		  $file_name = $_FILES['userfile']['name'];
		  $file_name = str_replace(' ','_',$file_name);


		  if ( ! $this->upload->do_upload('userfile'))
		  {
		    echo "
		    <script>
		      alert('Data Pembayaran Gagal ditambahkan.');
		    </script>";
		  }
		  else
		  {
		    $data = $this->input->post(null,TRUE);
		    $this->main_model->addNewFile($data);
		    $this->main_model->input_PembayaranByMhs($data);
		    // $this->main_model->addNewRegistrasi($data);

		    echo "
		    <script>
		      alert('Data Pembayaran Berhasil ditambahkan.');
		    </script>";

		  }
		  redirect('main_controller/view_mhs_statuspembayaran', 'refresh');
		}
		public function do_upload_materi(){
		  $data = $this->input->post(null,TRUE);
		  $path = './uploads/'.$this->session->level.'/'.$this->session->kode_user.'/'.$data['id_jadwal_master'].'/Materi';
		  if (!is_dir($path)) {
		    mkdir($path,0755,TRUE);
		  }

		  $config['upload_path']          = $path;
		  $config['allowed_types']        = 'pdf|docx|pptx|doc|ppt';
		  $config['max_size']             = 0;

		  $this->load->library('upload', $config);

		  $file_name = $_FILES['userfile']['name'];
		  $file_name = str_replace(' ','_',$file_name);


		  if ( ! $this->upload->do_upload('userfile'))
		  {
		    echo "
		    <script>
		      alert('Data Materi Gagal ditambahkan.');
		    </script>";
		  }
		  else
		  {

		    $this->main_model->addNewFileMateri($data);
		    $this->main_model->addNewMateri($data);

		    echo "
		    <script>
		      alert('Data Materi Berhasil ditambahkan.');
		    </script>";

		  }
		      redirect('main_controller/redirect_upload_materi/'.$data['id_jadwal_master'], 'refresh');
		}
		public function do_upload_tugas()
	    {
	      $data = $this->input->post(null,TRUE);
	      $path = './uploads/'.$this->session->level.'/'.$this->session->kode_user.'/'.$data['id_jadwal_master'].'/Tugas';
	      if (!is_dir($path)) {
	        mkdir($path,0755,TRUE);
	      }

	      $config['upload_path']          = $path;
	      $config['allowed_types']        = 'pdf|docx|pptx|doc|ppt';
	      $config['max_size']             = 0;
	      // $config['max_width']            = 1024;
	      // $config['max_height']           = 768;

	      $this->load->library('upload', $config);

	      $file_name = $_FILES['userfile']['name'];
	      $file_name = str_replace(' ','_',$file_name);


	      if ( ! $this->upload->do_upload('userfile'))
	      {
	        echo "
	        <script>
	          alert('Data Tugas Gagal ditambahkan.');
	        </script>";
	      }
	      else
	      {

	        $this->main_model->addNewFileTugas($data);
	        $this->main_model->addNewTugas($data);

	        echo "
	        <script>
	          alert('Data Tugas Berhasil ditambahkan.');
	        </script>";

	      }
	      redirect('main_controller/redirect_new_tugas/'.$data['id_jadwal_master'], 'refresh');
	    }
		public function do_upload_hasil_tugas()
	    {
	      $data = $this->input->post(null,TRUE);
	      $path = './uploads/'.$this->session->level.'/'.$this->session->kode_user.'/'.$data['id_jadwal_master'].'/Tugas';
	      if (!is_dir($path)) {
	        mkdir($path,0755,TRUE);
	      }

	      $config['upload_path']          = $path;
	      $config['allowed_types']        = 'pdf|docx|pptx|doc|ppt';
	      $config['max_size']             = 0;

	      $this->load->library('upload', $config);

	      $file_name = $_FILES['userfile']['name'];
	      $file_name = str_replace(' ','_',$file_name);


	      if ( ! $this->upload->do_upload('userfile'))
	      {
	        echo "
	        <script>
	          alert('Data Hasil Tugas Gagal ditambahkan.');
	        </script>";
	      }
	      else
	      {

	        $this->main_model->addNewFileHasilTugas($data);
	        $this->main_model->addNewHasilTugas($data);

	        echo "
	        <script>
	          alert('Data Hasil Tugas Berhasil ditambahkan.');
	        </script>";

	      }
	      redirect('main_controller/redirect_lihat_tugas/'.$data['id_jadwal_master'], 'refresh');
	    }
			public function do_upload_foto_profil(){
				$data = $this->input->post(null,TRUE);
			  $path = './uploads/'.$this->session->level.'/'.$this->session->kode_user.'/DP';
			  if (!is_dir($path)) {
			    mkdir($path,0755,TRUE);
			  }

			  $config['upload_path']          = $path;
			  $config['allowed_types']        = 'gif|jpg|png';
			  $config['max_size']             = 0;
			  $config['max_width']            = 1080;
			  $config['max_height']           = 1080;

			  $this->load->library('upload', $config);

			  $file_name = $_FILES['userfile']['name'];
			  $file_name = str_replace(' ','_',$file_name);


			  if ( ! $this->upload->do_upload('userfile'))
			  {
			    echo "
			    <script>
			      alert('Data Profil Gagal ditambahkan.');
			    </script>";
			  }
			  else
			  {
					$this->main_model->addNewFileFotoProfil($data);
					$this->main_model->editFotoProfil($data);
			    echo "
			    <script>
			      alert('Data Profil Berhasil ditambahkan.');
			    </script>";
			  }
			  redirect('main_controller/dashboard', 'refresh');
			}
				function download($id){
					$query =  $this->db->get_where('uploaded_file',array('id_bukti' => $id));
					if( $query->num_rows() > 0 )
					{
						$row = $query->row();
						$filename = $row->filename;

						$download_path = 'uploads/'.$row->dir;
						//echo $download_path;

						$file = $download_path;

						if(!file_exists($file)) die("I'm sorry, the file doesn't seem to exist.");

							$type = filetype($file);
							$today = date("F j, Y, g:i a");
							$time = time();
							header("Content-type:".$type);
							header("Content-Disposition: attachment;filename=".$filename);
							header("Content-Transfer-Encoding: binary");
							header('Pragma: no-cache');
							header('Expires: 0');
							set_time_limit(0);
							readfile($file);
					}
				}
		public function login()
	    {
	        $data = $this->input->post(null,TRUE);
	        $query = $this->main_model->validate($data);
	        if($query){
						if ($this->main_model->level == 3) {
							$result = $this->db->get_where('tbl_mahasiswa',array('nim'=>$this->main_model->kode_user,'status_mahasiswa'=>2));
							if ($result->num_rows()>0) {
								echo "<script>alert('Akun anda sudah di non-aktifkan, Terimakasih.');</script>";
								$this->logout();
							}else{
								$sess_data = array(
		            	'kode_user' => $this->main_model->kode_user,
		            	'id_kelas' => $this->main_model->id_kelas,
	                'username' => $query->username,
	                'display_name' => $this->main_model->display_name,

	                'level' => $this->main_model->level,
									'id_prodi' => $this->main_model->id_prodi,
	                'is_logged' => TRUE
		            );

		            $this->session->set_userdata($sess_data);
		            $this->db->where('kode_user',$this->main_model->kode_user);
	    					$this->db->update('tbl_users', array('last_login'=> date('Y-m-d h:i:sa')));
								redirect('main_controller/dashboard','refresh');
							}
						}else{
							$sess_data = array(
	            	'kode_user' => $this->main_model->kode_user,
                'username' => $query->username,
                'display_name' => $this->main_model->display_name,
                'level' => $this->main_model->level,
								'id_prodi' => $this->main_model->id_prodi,
                'is_logged' => TRUE
	            );
	            date_default_timezone_set("Asia/Bangkok");
	            $this->session->set_userdata($sess_data);
	            $this->db->where('kode_user',$this->main_model->kode_user);
    					$this->db->update('tbl_users', array('last_login'=> date('Y-m-d h:i:sa')));
							redirect('main_controller/dashboard','refresh');
						}
	        }else{
							echo "<script>alert('Username/Password Salah.');</script>";
	            redirect('main_controller/index','refresh');
	        }
	    }
	    public function logout()
	    {
	    	$this->session->sess_destroy();
	    	redirect('main_controller/index','refresh');
	    }

	    //CRUD MAHASISWA
	    public function MHS_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_MHS($data);
	        if($query == 0){
	        	echo "
	        	<script>
					alert('Data Mahasiswa Berhasil ditambahkan.');
				</script>";
				//redirect('main_controller/view_all_mhs/1', 'refresh');

	        	$query = $this->main_model->generate_MHSuser($data);
	        	if($query){
	        		echo "
	        		<script>
						alert('Data User Mahasiswa Berhasil ditambahkan.');
					</script>";
					//redirect('main_controller/view_all_mhs/1', 'refresh');
	        	}else{
	        		echo "
	        		<script>
						alert('Data User Mahasiswa Gagal ditambahkan.');
					</script>";
					//redirect('main_controller/view_all_mhs/1', 'refresh');
	        	}

	        	$query = $this->main_model->insert_into_app_kelas_mhs($data);
	        	if($query){
	        		echo "
	        		<script>
						alert('Data Kelas Mahasiswa Berhasil ditambahkan.');
					</script>";
					redirect('main_controller/view_all_mhs/1', 'refresh');
	        	}else{
	        		echo "
	        		<script>
						alert('Data Kelas Mahasiswa Gagal ditambahkan.');
					</script>";
					redirect('main_controller/view_all_mhs/1', 'refresh');
	        	}
	        }else{
	        	echo "
	        	<script>
					alert('NIM tersebut sudah ada!');
				</script>";
				redirect('main_controller/view_all_mhs/1', 'refresh');
	        }
	    }
	    public function view_all_mhs($id){
	    	if ($this->session->level == 1){
		    	$data['mahasiswa'] = $this->main_model->getMahasiswaByOrder($id);
		    	$data['pekerjaan'] = $this->main_model->getPekerjaan();
		    	$data['prodi'] = $this->main_model->getProdi();
		    	$data['angkatan'] = $this->main_model->getAngkatan();
		    	$data['kelas'] = $this->main_model->getKelas();
		    	$data['agama'] = $this->main_model->getAgama();
					$data['id']	= $id;

		    	$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_student';
				$this->load->view('vw_dashboard',$data);
			}else{
				redirect('main_controller/index','refresh');
			}
	    }
			public function view_all_khs(){
	    	if ($this->session->level == 1){
		    	$data['mahasiswa'] = $this->main_model->getMahasiswa();
		    	$data['pekerjaan'] = $this->main_model->getPekerjaan();
		    	$data['prodi'] = $this->main_model->getProdi();
		    	$data['angkatan'] = $this->main_model->getAngkatan();
		    	$data['kelas'] = $this->main_model->getKelas();
		    	$data['agama'] = $this->main_model->getAgama();
		    	$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_khs';
				$this->load->view('vw_dashboard',$data);
			}else{
				redirect('main_controller/index','refresh');
			}
	    }
	    public function redirect_update_mhs($nim){
	    	if ($this->session->level == 1){
	    		$data['mahasiswa'] = $this->main_model->getSatuMahasiswa($nim);
	    		$data['pekerjaan'] = $this->main_model->getPekerjaan();
		    	$data['prodi'] = $this->main_model->getProdi();
		    	$data['angkatan'] = $this->main_model->getAngkatan();
		    	$data['kelas'] = $this->main_model->getKelas();
		    	$data['agama'] = $this->main_model->getAgama();
	    		$data['main_sidebar'] = 'sb_admin';
	    		$data['main_content'] = 'vw_edit_student';
	    		$this->load->view('vw_dashboard', $data);
			}else{
				redirect('main_controller/index','refresh');
			}
	    }
	    public function MHS_update(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->update_MHS($data);
	        if($query){
	        	echo "
	        	<script>
					alert('Data Mahasiswa Berhasil diubah.');
				</script>";
				redirect('main_controller/view_all_mhs/1', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Mahasiswa Gagal diubah.');
				</script>";
				redirect('main_controller/view_all_mhs/1', 'refresh');
	        }
	    }

		//CRUD DOSEN
	    public function Dosen_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_Dosen($data);
	        if($query == 0){
	        	echo "
	        	<script>
					alert('Data Dosen Berhasil ditambahkan.');
				</script>";
				//redirect('main_controller/view_all_dosen/1', 'refresh');

	        	$query = $this->main_model->generate_DSNuser($data);
	        	if($query){
	        		echo "
	        		<script>
						alert('Data User Dosen Berhasil ditambahkan.');
					</script>";
					redirect('main_controller/view_all_dosen/1', 'refresh');
	        	}else{
	        		echo "
	        		<script>
						alert('Data User Dosen Gagal ditambahkan.');
					</script>";
					redirect('main_controller/view_all_dosen/1', 'refresh');
	        	}
	        }else{
	        	echo "
	        	<script>
					alert('NIDN tersebut sudah ada!');
				</script>";
				redirect('main_controller/view_all_dosen/1', 'refresh');
	        }
	    }
	    public function view_all_dosen($id){
	    	if ($this->session->level == 1){
		    	$data['dosen'] = $this->main_model->getDosenByOrder($id);
		    	$data['prodi'] = $this->main_model->getProdi();
		    	$data['agama'] = $this->main_model->getAgama();
					$data['id'] = $id;
		    	$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_dosen';
				$this->load->view('vw_dashboard',$data);
			}else{
				redirect('main_controller/index','refresh');
			}
	    }
	    public function redirect_update_dosen($nidn){
	    	if ($this->session->level == 1){
	    		$data['dosen'] = $this->main_model->getSatuDosen($nidn);
		    	$data['prodi'] = $this->main_model->getProdi();
		    	$data['agama'] = $this->main_model->getAgama();
	    		$data['main_sidebar'] = 'sb_admin';
	    		$data['main_content'] = 'vw_edit_dosen';
	    		$this->load->view('vw_dashboard', $data);
			}else{
				redirect('main_controller/index','refresh');
			}
	    }
	    public function Dosen_update(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->update_Dosen($data);
	        if($query){
	        	echo "
	        	<script>
					alert('Data Dosen Berhasil diubah.');
				</script>";
				redirect('main_controller/view_all_dosen/1', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Dosen Gagal diubah.');
				</script>";
				redirect('main_controller/view_all_dosen/1', 'refresh');
	        }
	    }
		public function dosen_delete($nidn) {
		    $query = $this->main_model->del_dosen($nidn);
		    if($query == TRUE){
	        	echo "
	        	<script>
					alert('Data Dosen Berhasil dihapus.');
				</script>";
				//redirect('main_controller/view_all_dosen/1', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Dosen Gagal dihapus.');
				</script>";
				//redirect('main_controller/view_all_dosen/1', 'refresh');
	        }
	        $query = $this->main_model->del_users($nidn);
		    if($query){
	        	echo "
	        	<script>
					alert('Data User Dosen Berhasil dihapus.');
				</script>";
				redirect('main_controller/view_all_dosen/1', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data User Dosen Gagal dihapus.');
				</script>";
				redirect('main_controller/view_all_dosen/1', 'refresh');
	        }
		}

		//CRUD GEDUNG
	    public function Gedung_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_Gedung($data);
	        if($query == 0){
	        	echo "
	        	<script>
					alert('Data Gedung Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/view_all_gedung', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Nama gedung tersebut sudah ada!');
				</script>";
				redirect('main_controller/view_all_gedung', 'refresh');
	        }
	    }
	    public function view_all_gedung(){
	    	if ($this->session->level == 1){
		    	$data['gedung'] = $this->main_model->getGedung();
		    	$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_gedung';
		    	$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function redirect_update_gedung($id){
	    	if ($this->session->level == 1){
	    		$data['gedung'] = $this->main_model->getSatuGedung($id);
	    		$data['main_sidebar'] = 'sb_admin';
	    		$data['main_content'] = 'vw_edit_gedung';
	    		$this->load->view('vw_dashboard', $data);
			}else{
				redirect('main_controller/index');
			}
	    }
	    public function Gedung_update(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->update_Gedung($data);
	        if($query == TRUE){
	        	echo "
	        	<script>
					alert('Data Gedung Berhasil diubah.');
				</script>";
				redirect('main_controller/view_all_gedung', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Gedung Gagal diubah.');
				</script>";
				redirect('main_controller/view_all_gedung', 'refresh');
	        }
	    }
		public function gedung_delete($gedung_id){
			$query = $this->main_model->del_gedung($gedung_id);
			if($query == TRUE){
	        	echo "
	        	<script>
					alert('Data Gedung Berhasil dihapus.');
				</script>";
				redirect('main_controller/view_all_gedung', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Gedung Gagal dihapus.');
				</script>";
				redirect('main_controller/view_all_gedung', 'refresh');
	        }
		}

		//CRUD RUANGAN
	    public function Ruangan_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_Ruangan($data);
	        if($query == 0){
	        	echo "
	        	<script>
					alert('Data Ruangan Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/view_all_ruangan', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Ruangan tersebut sudah ada!');
				</script>";
				redirect('main_controller/view_all_ruangan', 'refresh');
	        }
	    }
	    public function view_all_ruangan(){
	    	if ($this->session->level == 1){
		    	$data['ruangan'] = $this->main_model->getRuangan();
		    	$data['Gedung'] = $this->main_model->getGedung();
		    	$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_ruangan';
		    	$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function redirect_update_ruangan($id){
	    	if ($this->session->level == 1){
	    		$data['ruangan'] = $this->main_model->getSatuRuangan($id);
	    		$data['gedung'] = $this->main_model->getGedung();
	    		$data['main_sidebar'] = 'sb_admin';
	    		$data['main_content'] = 'vw_edit_ruangan';
	    		$this->load->view('vw_dashboard', $data);
			}
	    }
	    public function Ruangan_update(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->update_Ruangan($data);
	        if($query == TRUE){
	        	echo "
	        	<script>
					alert('Data Ruangan Berhasil diubah.');
				</script>";
				redirect('main_controller/view_all_ruangan', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Ruangan Gagal diubah.');
				</script>";
				redirect('main_controller/view_all_ruangan', 'refresh');
	        }
	    }
	    public function ruangan_delete($ruangan_id) {
		    $query = $this->main_model->del_ruangan($ruangan_id);
		    if($query = TRUE){
	        	echo "
	        	<script>
					alert('Data Ruangan Berhasil dihapus.');
				</script>";
				redirect('main_controller/view_all_ruangan', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Ruangan Gagal dihapus.');
				</script>";
				redirect('main_controller/view_all_ruangan', 'refresh');
	        }
		}

		//CRUD PROGRAM STUDI
	    public function Prodi_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_Prodi($data);
	        if($query == 0){
	        	echo "
	        	<script>
					alert('Data Program Studi Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/view_all_prodi', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Program Strudi tersebut sudah ada!');
				</script>";
				redirect('main_controller/view_all_prodi', 'refresh');
	        }
	    }
	    public function view_all_prodi(){
	    	if ($this->session->level == 1){
	    		$data['prodi'] = $this->main_model->getProdi();
	    		$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_prodi';
	    		$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function redirect_update_prodi($id){
	    	if ($this->session->level == 1){
	    		$data['prodi'] = $this->main_model->getSatuProdi($id);
	    		$data['main_sidebar'] = 'sb_admin';
	    		$data['main_content'] = 'vw_edit_prodi';
	    		$this->load->view('vw_dashboard', $data);
			}
	    }
	    public function Prodi_update(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->update_Prodi($data);
	        if($query != false){
	        	echo "
	        	<script>
					alert('Data Program Studi Berhasil diubah.');
				</script>";
				redirect('main_controller/view_all_prodi', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Program Studi Gagal diubah.');
				</script>";
				redirect('main_controller/view_all_prodi', 'refresh');
	        }
	    }

	    //CRUD ANGKATAN
	    public function Angkatan_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_Angkatan($data);
	        if($query == 0){
	        	echo "
	        	<script>
					alert('Angkatan Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/view_all_angkatan', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Angkatan tersebut sudah ada!');
				</script>";
				redirect('main_controller/view_all_angkatan', 'refresh');
	        }
	    }
	    public function view_all_angkatan(){
	    	if ($this->session->level == 1){
	    		$data['angkatan'] = $this->main_model->getAngkatan();
	    		$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_angkatan';
	    		$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function redirect_update_angkatan($id){
	    	if ($this->session->level == 1){
	    		$data['angkatan'] = $this->main_model->getSatuAngkatan($id);
	    		$data['main_sidebar'] = 'sb_admin';
	    		$data['main_content'] = 'vw_edit_angkatan';
	    		$this->load->view('vw_dashboard', $data);
			}
	    }
	    public function Angkatan_update(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->update_Angkatan($data);
	        if($query != false){
	        	echo "
	        	<script>
					alert('Data Angkatan Berhasil diubah.');
				</script>";
				redirect('main_controller/view_all_angkatan', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Angkatan Gagal diubah.');
				</script>";
				redirect('main_controller/view_all_angkatan', 'refresh');
	        }
	    }
	    public function Angkatan_delete($angkatan_id) {
		    $query = $this->main_model->del_angkatan($angkatan_id);
		    if($query){
	        	echo "
	        	<script>
					alert('Data Angkatan Berhasil dihapus.');
				</script>";
				redirect('main_controller/view_all_angkatan', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Angkatan Gagal dihapus.');
				</script>";
				redirect('main_controller/view_all_angkatan', 'refresh');
	        }
		}


		//CRUD KELAS
	    public function Kelas_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_Kelas($data);
	        if($query){
	        	echo "
	        	<script>
					alert('Data Kelas Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/view_all_kelas', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Kelas Gagal ditambahkan.');
				</script>";
				redirect('main_controller/view_all_kelas', 'refresh');
	        }
	    }
	    public function view_all_kelas(){
	    	if ($this->session->level == 1){
	    		$data['kelas'] = $this->main_model->getKelas();
	    		$data['prodi'] = $this->main_model->getProdi();
	    		$data['angkatan'] = $this->main_model->getAngkatan();

	    		$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_kelas';
	    		$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    //AJAX
	    function ambil_data(){
			$modul=$this->input->post('modul');
			$id=$this->input->post('id');
			if($modul=="kelas_prodi"){
				echo $this->main_model->kelas($id);
			}
			else if($modul=="mk_prodi"){
				echo $this->main_model->matkul($id);
			}
			else if($modul=="ruangan"){
				echo $this->main_model->gedung($id);
			}
			else if($modul=="dosen"){
				echo $this->main_model->dosen($id);
			}
		}
	  //   public function redirect_update_kelas($id){
	  //   	if ($this->session->level == 1){
	  //   		$data['kelas'] = $this->main_model->getSatuProdi($id);
	  //   		$data['main_sidebar'] = 'sb_admin';
	  //   		$data['main_content'] = 'vw_edit_prodi';
	  //   		$this->load->view('vw_dashboard', $data);
			// }
	  //   }
	   //  public function Prodi_update(){
	   //  	$data = $this->input->post(null,TRUE);
	   //      $query = $this->main_model->update_Prodi($data);
	   //      if($query != false){
	   //      	echo "
	   //      	<script>
				// 	alert('Data Program Studi Berhasil diubah.');
				// </script>";
				// redirect('main_controller/view_all_prodi', 'refresh');
	   //      }else{
	   //      	echo "
	   //      	<script>
				// 	alert('Data Program Studi Gagal diubah.');
				// </script>";
				// redirect('main_controller/view_all_prodi', 'refresh');
	   //      }
	   //  }
	   //  public function prodi_delete($data){
	   //  	$query = $this->main_model->del_prodi($data);
		  //   if($query){
	   //      	echo "
	   //      	<script>
				// 	alert('Data Prodi Berhasil dihapus.');
				// </script>";
				// redirect('main_controller/view_all_prodi', 'refresh');
	   //      }else{
	   //      	echo "
	   //      	<script>
				// 	alert('Data Prodi Gagal dihapus.');
				// </script>";
				// redirect('main_controller/view_all_prodi', 'refresh');
	   //      }
	   //  }

		//CRUD MATA KULIAH
	    public function mk_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_mk($data);
	        if($query == 0){
	        	echo "
	        	<script>
					alert('Data Mata Kuliah Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/view_all_mk', 'refresh');
	        }elseif($query == 1){
	        	echo "
	        	<script>
					alert('Kode Mata Kuliah tersebut sudah ada!');
				</script>";
				redirect('main_controller/view_all_mk', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Nama Mata Kuliah tersebut sudah ada!');
				</script>";
				redirect('main_controller/view_all_mk', 'refresh');
	        }
	    }
	    public function view_all_mk(){
	    	if ($this->session->level == 1){
	    		$data['mk'] = $this->main_model->getMK();
	    		$data['prodi'] = $this->main_model->getProdi();
	    		$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_mk';
	    		$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function redirect_update_matkul($id){
	    	if ($this->session->level == 1){
	    		$data['matkul'] = $this->main_model->getSatuMatkul($id);
	    		$data['main_sidebar'] = 'sb_admin';
	    		$data['main_content'] = 'vw_edit_mk';
	    		$this->load->view('vw_dashboard', $data);
			}
	    }
	    public function Matkul_update(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->update_Matkul($data);
	        if($query != false){
	        	echo "
	        	<script>
					alert('Data Mata Kuliah Berhasil diubah.');
				</script>";
				redirect('main_controller/view_all_mk', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Mata Kuliah Gagal diubah.');
				</script>";
				redirect('main_controller/view_all_mk', 'refresh');
	        }
	    }
	    public function mk_delete($data) {
		    $query = $this->main_model->del_mk($data);
		    if($query == TRUE){
	        	echo "
	        	<script>
					alert('Mata Kuliah Berhasil dihapus.');
				</script>";
				redirect('main_controller/view_all_mk', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Mata Kuliah Gagal dihapus.');
				</script>";
				redirect('main_controller/view_all_mk', 'refresh');
	        }
		}

		//CRUD Jadwal Master
		public function jadwal_master_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_Jadwal_master($data);
	        if($query == 0){
	        	echo "
	        	<script>
					alert('Data Jadwal Kuliah Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/view_all_jadwal_master', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Jadwal Kuliah Gagal ditambahkan.');
				</script>";
				redirect('main_controller/view_all_jadwal_master', 'refresh');
	        }
	    }
	    public function view_all_jadwal_master(){
	    	if ($this->session->level == 1){
	    		$data['jadwal'] = $this->main_model->getJadwal_master();
	    		$data['tahun_akademik'] = $this->main_model->getAkademik();
	    		$data['matkul'] = $this->main_model->getMK();
	    		$data['prodi'] = $this->main_model->getProdi();
	    		$data['dosen'] = $this->main_model->getDosen();

	    		$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_jadwal_master';
	    		$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function redirect_update_jadwal_master($id_jadwal_master){
	    	if ($this->session->level == 1){
	    		$data['jadwal'] = $this->main_model->get_satu_jadwal_master($id_jadwal_master);
	    		$data['tahun_akademik'] = $this->main_model->getAkademik();
	    		$data['matkul'] = $this->main_model->getMK();
	    		$data['prodi'] = $this->main_model->getProdi();
	    		$data['dosen'] = $this->main_model->getDosen();

	    		$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_edit_jadwal_master';
	    		$this->load->view('vw_dashboard', $data);
			}else{
				redirect('main_controller/index');
			}
	    }
	    public function Jadwal_master_update(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->update_jadwal_master($data);
	        if($query == TRUE){
	        	echo "
	        	<script>
					alert('Data Jadwal Master Berhasil diubah.');
				</script>";
				redirect('main_controller/view_all_jadwal_master', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Jadwal Master Gagal diubah.');
				</script>";
				redirect('main_controller/view_all_jadwal_master', 'refresh');
	        }
	    }
	    public function jadwal_master_delete($id_jadwal_master){
			$query = $this->main_model->del_jadwal_master($id_jadwal_master);
			if($query == TRUE){
	        	echo "
	        	<script>
					alert('Jadwal tersebut Berhasil dihapus.');
				</script>";
				redirect('main_controller/view_all_jadwal_master', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Jadwal tersebut Gagal dihapus.');
				</script>";
				redirect('main_controller/view_all_jadwal_master', 'refresh');
	        }
		}

		//CRUD JADWAL
	    public function jadwal_mk_addNew(){
	    	$data = $this->input->post(null,TRUE);
	    	$jadwal_master = $this->main_model->get_satu_jadwal_master($data['id_jadwal_master']);
	        $query = $this->main_model->input_Jadwal_mk($data, $jadwal_master);
	        if($query != false){
	        	echo "
	        	<script>
					alert('Data Jadwal Kuliah Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/redirect_lihat_jadwal/' .$data['id_jadwal_master'], 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Jadwal Kuliah Gagal ditambahkan.');
				</script>";
				redirect('main_controller/redirect_lihat_jadwal/' .$data['id_jadwal_master'], 'refresh');
	        }
	    }
	    public function redirect_lihat_jadwal($id_jadwal_master){
	    	if ($this->session->level == 1){
	    		$data['jadwal_master'] = $this->main_model->get_satu_jadwal_master($id_jadwal_master);
	    		$data['jadwal'] = $this->main_model->get_satu_jadwal_mk($id_jadwal_master);
	    		$data['hari'] = $this->main_model->getHari();
	    		$data['gedung'] = $this->main_model->getGedung();
	    		$data['ruangan'] = $this->main_model->getRuangan();
	    		$data['shift'] = $this->main_model->getShift();

	    		$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_jadwal_matkul';
	    		$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function jadwal_matkul_delete($id_jadwal_matkul, $id_jadwal_master){
			$query = $this->main_model->del_jadwal_matkul($id_jadwal_matkul);
			if($query == TRUE){
	        	echo "
	        	<script>
					alert('Jadwal tersebut Berhasil dihapus.');
				</script>";
				redirect('main_controller/redirect_lihat_jadwal/' .$id_jadwal_master, 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Jadwal tersebut Gagal dihapus.');
				</script>";
				redirect('main_controller/redirect_lihat_jadwal/' .$id_jadwal_master, 'refresh');
	        }
		}
	    public function jadwal_ujian_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_Jadwal_ujian($data);
	        if($query != false){
	        	echo "
	        	<script>
					alert('Data Jadwal Ujian Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/view_all_jadwal_ujian', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Jadwal Ujian Gagal ditambahkan.');
				</script>";
				redirect('main_controller/view_all_jadwal_ujian', 'refresh');
	        }
	    }
	    public function view_all_jadwal_ujian(){
	    	if ($this->session->level == 1){
	    		$data['jadwal'] = $this->main_model->getJadwal_ujian();
	    		$data['hari'] = $this->main_model->getHari();
	    		$data['gedung'] = $this->main_model->getGedung();
	    		$data['ruangan'] = $this->main_model->getRuangan();
	    		$data['matkul'] = $this->main_model->getMK();
	    		$data['prodi'] = $this->main_model->getProdi();
	    		$data['kelas'] = $this->main_model->getKelas();
	    		$data['shift'] = $this->main_model->getShift();
				$data['tahun_akademik'] = $this->main_model->getAkademik();

	    		$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_jadwal_ujian';
	    		$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function jadwal_ujian_delete($id){
			$query = $this->main_model->del_jadwal_ujian($id);
			if($query){
	        	echo "
	        	<script>
					alert('Jadwal tersebut Berhasil dihapus.');
				</script>";
				redirect('main_controller/view_all_jadwal_ujian', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Jadwal tersebut Gagal dihapus.');
				</script>";
				redirect('main_controller/view_all_jadwal_ujian', 'refresh');
	        }
		}
	 //    public function redirect_update_matkul($id){
	 //    	if ($this->session->level == 1){
	 //    		$data['matkul'] = $this->main_model->getSatuMatkul($id);
	 //    		$data['main_sidebar'] = 'sb_admin';
	 //    		$data['main_content'] = 'vw_edit_mk';
	 //    		$this->load->view('vw_dashboard', $data);
		// 	}
	 //    }
	 //    public function Matkul_update(){
	 //    	$data = $this->input->post(null,TRUE);
	 //        $query = $this->main_model->update_Matkul($data);
	 //        if($query != false){
	 //        	echo "
	 //        	<script>
		// 			alert('Data Mata Kuliah Berhasil diubah.');
		// 		</script>";
		// 		redirect('main_controller/view_all_mk', 'refresh');
	 //        }else{
	 //        	echo "
	 //        	<script>
		// 			alert('Data Mata Kuliah Gagal diubah.');
		// 		</script>";
		// 		redirect('main_controller/view_all_mk', 'refresh');
	 //        }
	 //    }
	 //    public function mk_delete($data) {
		//     $query = $this->main_model->del_mk($data);
		//     if($query){
	 //        	echo "
	 //        	<script>
		// 			alert('Mata Kuliah Berhasil dihapus.');
		// 		</script>";
		// 		redirect('main_controller/view_all_mk', 'refresh');
	 //        }else{
	 //        	echo "
	 //        	<script>
		// 			alert('Mata Kuliah Gagal dihapus.');
		// 		</script>";
		// 		redirect('main_controller/view_all_mk', 'refresh');
	 //        }
		// }

		//MAHASISWA
		public function view_mhs_editprofil(){
	        if ($this->session->level == 3){
	          	$data['mahasiswa'] = $this->main_model->getSatuMahasiswa($this->session->kode_user);
	          	$data['pekerjaan'] = $this->main_model->getPekerjaan();
	          	$data['prodi'] = $this->main_model->getProdi();
	          	$data['angkatan'] = $this->main_model->getAngkatan();
	          	$data['kelas'] = $this->main_model->getKelas();
	          	$data['agama'] = $this->main_model->getAgama();
	          	$data['no_telp'] = $this->main_model->getAgama();

	          	$data['main_sidebar'] = 'sb_mhs';
	          	$data['main_content'] = 'vw_mhs_editprofil';
	          	$this->load->view('vw_dashboard', $data);
	        }else{
	        	redirect('main_controller/index');
	      	}
      	}

			public function MHS_MHS_update(){
						$data = $this->input->post(null,TRUE);
		        $query = $this->main_model->update_MHS_MHS($data);
		        if($query){
		        	echo "
		            <script>
		          		alert('Data Mahasiswa Berhasil diubah.');
		        	</script>";
		        	redirect('main_controller/view_mhs_editprofil', 'refresh');
		        }else{
		            echo "
		            <script>
		          		alert('Data Mahasiswa Gagal diubah.');
		        	</script>";
		        	redirect('main_controller/view_mhs_editprofil', 'refresh');
		        }
		    }

			public function view_mhs_ubahpassword(){
			 if ($this->session->level == 3){
				 $data['main_sidebar'] = 'sb_mhs';
				 $data['main_content'] = 'vw_mhs_ubahpassword';
				 $this->load->view('vw_dashboard', $data);
			 }
		 }

	    public function view_mhs_jadwalkuliah(){
	    	if ($this->session->level == 3){
	    		$data['jadwalmhs'] = $this->main_model->getJadwal_Mhs();
					$data['status_regis_mhs'] = $this->main_model->getStatusRegisMhs($this->session->kode_user);

	    		$data['main_sidebar'] = 'sb_mhs';
	    		$data['main_content'] = 'vw_mhs_jadwalkuliah';
	    		$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function view_mhs_jadwalujian(){
	    	if ($this->session->level == 3) {
	    		$kuisioner_isFilled = $this->main_model->kuisioner_mhs_isFilled($this->session->kode_user);
	    		if($kuisioner_isFilled == TRUE){
	    			$data['jadwalmhs'] = $this->main_model->getJadwal_ujian_Mhs();
					$data['status_bayar_mhs'] = $this->main_model->getStatusPembayaranMhs($this->session->kode_user);

		    		$data['main_sidebar'] = 'sb_mhs';
		    		$data['main_content'] = 'vw_mhs_jadwalujian';
	    			$this->load->view('vw_dashboard',$data);
	    		} else{
	    			//redirect ke halaman kuisioner
					echo "
					<script>
						alert('Anda harus lengkapi kuisioner terlebih dahulu!');
					</script>";
					redirect('main_controller/view_all_judul_kuisioner_mhs', 'refresh');
	    		}
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function view_mhs_kehadiran(){
	    	if ($this->session->level == 3) {
	    		$data['main_sidebar'] = 'sb_mhs';
	    		$data['main_content'] = 'vw_mhs_kehadiran';

				$data['tahun_ak_open'] = $this->main_model->getTahunAkademik($this->main_model->getOpenTahunAkademik());
				$data['presensi']= $this->main_model->getMhsPresensi();

	    		$this->load->view('vw_dashboard',$data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function view_mhs_nilai(){
	    	if ($this->session->level == 3) {
				$data['nilaimhs'] = $this->main_model->getNilai_Mhs();
				$data['ips'] = $this->main_model->getNilai_IPS();
				$data['ipk'] = $this->main_model->getNilai_IPK();


	    		$data['main_sidebar'] = 'sb_mhs';
	    		$data['main_content'] = 'vw_mhs_nilai';
	    		$this->load->view('vw_dashboard',$data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
			public function view_mhs_statuspembayaran(){
			  if ($this->session->level == 3) {
			    $data['k_status'] = $this->main_model->getStatusPembayaranSatu();
			    $data['tahun_akademik'] = $this->main_model->getAkademik();
			    $data['status_bayar_mhs'] = $this->main_model->getStatusPembayaranMhsByThnAkd($this->session->kode_user);
			    $data['tahun_ak_open'] = $this->main_model->getTahunAkademik($this->main_model->getOpenTahunAkademik());

			    $data['main_sidebar'] = 'sb_mhs';
			    $data['main_content'] = 'vw_mhs_statuspembayaran';
			    $this->load->view('vw_dashboard',$data);
			  }else{
			  redirect('main_controller/index');
			}
			}
	    public function view_mhs_uploadbuktipembayaran(){
	    	if ($this->session->level == 3) {
	    		$data['main_sidebar'] = 'sb_mhs';
	    		$data['main_content'] = 'vw_mhs_uploadbuktipembayaran';
	    		$this->load->view('vw_dashboard',$data);
	    	}else{
				redirect('main_controller/index');
			}
	    }

			public function view_mhs_statusregistrasi(){
	    	if ($this->session->level == 3) {
	    		$data['main_sidebar'] = 'sb_mhs';
	    		$data['main_content'] = 'vw_mhs_statusregistrasi';
	    		$this->load->view('vw_dashboard',$data);
	    	}
	    }

			public function view_mhs_cetakksm(){
			 if ($this->session->level == 3) {
				 $data['main_sidebar'] = 'sb_mhs';
				 $data['main_content'] = 'vw_mhs_cetakksm';
				 $this->load->view('vw_dashboard',$data);
			 }
		 }
		 public function view_mhs_registrasimk(){
      if ($this->session->level == 3) {
				$data['status_bayar_mhs'] = $this->main_model->getStatusPembayaranMhs($this->session->kode_user);
				$data['mk1'] = $this->main_model->getJadwal_tingkat(1);
				$data['mk2'] = $this->main_model->getJadwal_tingkat(2);
				$data['mk3'] = $this->main_model->getJadwal_tingkat(3);
				$data['mk4'] = $this->main_model->getJadwal_tingkat(4);
				$data['tempkrs'] = $this->main_model->gettemp_krs();
				$data['status_regis_mhs'] = $this->main_model->getStatusRegisMhs($this->session->kode_user);

       	$data['main_sidebar'] = 'sb_mhs';
       	$data['main_content'] = 'vw_mhs_registrasimk';
       	$this->load->view('vw_dashboard',$data);
      }
     }

    //KUISIONER MAHASISWA
    public function view_all_judul_kuisioner_mhs(){
		if ($this->session->level == 3){
		    $data['judul_kuisioner'] = $this->main_model->getJudul_kuisioner_mhs();

		   	$data['main_sidebar'] = 'sb_mhs';
	    	$data['main_content'] = 'vw_mhs_kuisioner';
		   	$this->load->view('vw_dashboard', $data);
		}else{
			redirect('main_controller/index');
		}
    }
    public function redirect_input_kuisioner_mhs($id_kuisioner_judul){
		if ($this->session->level == 3){
			$tipe_kuisioner = $this->main_model->getTipe_kuisioner($id_kuisioner_judul);
			if($tipe_kuisioner == 1){
				//redirect_input_kuisioner_tipesatu_mhs
			    $data['matkul'] = $this->main_model->getMatkulByKRS();
			    $data['kuisioner_judul'] = $this->main_model->get_satu_judul_kuisioner($id_kuisioner_judul);

			   	$data['main_sidebar'] = 'sb_mhs';
		    	$data['main_content'] = 'vw_mhs_kuisioner_all_matkul';
			   	$this->load->view('vw_dashboard', $data);
			} else{
				//redirect_input_kuisioner_tipedua_mhs
				if($this->main_model->kuisioner_mhs_hasil_tipe_dua_isFilled($id_kuisioner_judul, $this->session->kode_user) == TRUE){
					//redirect ke lihat kuisioner
				    $data['kuisioner'] = $this->main_model->get_kuisioner_mhs_hasil_tipe_dua($id_kuisioner_judul, $this->session->kode_user);

				   	$data['main_sidebar'] = 'sb_mhs';
			    	$data['main_content'] = 'vw_mhs_lihat_kuisioner_tipe_dua';
				   	$this->load->view('vw_dashboard', $data);
				} else{
					//redirect ke input kuisioner
					$data['judul_kuisioner'] = $this->main_model->get_satu_judul_kuisioner($id_kuisioner_judul);
				    $data['pertanyaan_kuisioner'] = $this->main_model->get_pertanyaan_kuisioner($id_kuisioner_judul);

				   	$data['main_sidebar'] = 'sb_mhs';
			    	$data['main_content'] = 'vw_mhs_input_kuisioner_tipe_dua';
				   	$this->load->view('vw_dashboard', $data);
				}
			}
		}else{
			redirect('main_controller/index');
		}
    }
    public function redirect_input_kuisioner_mhs_tipe_satu($id_kuisioner_judul, $id_jadwal_master, $nim){
		if ($this->session->level == 3){
			//cek udah diisi ato blm
			if($this->main_model->kuisioner_mhs_hasil_tipe_satu_isFilled($id_kuisioner_judul, $id_jadwal_master, $nim) == TRUE){
				//redirect ke lihat kuisioner
			    $data['kuisioner'] = $this->main_model->get_kuisioner_mhs_hasil_tipe_satu($id_kuisioner_judul, $id_jadwal_master, $nim);

			   	$data['main_sidebar'] = 'sb_mhs';
		    	$data['main_content'] = 'vw_mhs_lihat_kuisioner_tipe_satu';
			   	$this->load->view('vw_dashboard', $data);
			} else{
				//redirect ke input kuisioner
				$data['judul_kuisioner'] = $this->main_model->get_satu_judul_kuisioner($id_kuisioner_judul);
			    $data['pertanyaan_kuisioner'] = $this->main_model->get_pertanyaan_kuisioner($id_kuisioner_judul);
			    $data['jadwal'] = $this->main_model->get_satu_jadwal_master($id_jadwal_master);

			   	$data['main_sidebar'] = 'sb_mhs';
		    	$data['main_content'] = 'vw_mhs_input_kuisioner_tipe_satu';
			   	$this->load->view('vw_dashboard', $data);
			}
		}else{
			redirect('main_controller/index');
		}
    }
    public function kuisioner_mhs_tipe_satu_addNew(){
		$data = $this->input->post(null,TRUE);

		$berhasil = TRUE;
		$pertanyaan_kuisioner = $this->main_model->get_pertanyaan_kuisioner($data['id_kuisioner_judul']);
		foreach($pertanyaan_kuisioner->result() as $pk){
		    $query = $this->main_model->input_kuisioner_mhs_tipe_satu($data['id_kuisioner_judul'], $pk->id_kuisioner_pertanyaan, $data['id_jadwal_master'], $data['nim'], $data[$pk->id_kuisioner_pertanyaan]);
		    if($query != 0){
		    	$berhasil = FALSE;
		   	}
		}

		if($berhasil == TRUE){
		    $query2 = $this->main_model->kuisioner_jadwal_master_isFilled($data['id_jadwal_master']);
		    if($query2 != 0){
		    	$berhasil = FALSE;
		    }
		}

		if($berhasil == TRUE){
		    echo "
		    <script>
				alert('Data Kuisioner Berhasil diinput.');
			</script>";
			redirect('main_controller/redirect_input_kuisioner_mhs/' .$data['id_kuisioner_judul'], 'refresh');
		}else{
		    echo "
		    <script>
				alert('Data Kuisioner Gagal diinput!');
			</script>";
			redirect('main_controller/redirect_input_kuisioner_mhs/' .$data['id_kuisioner_judul'], 'refresh');
		}
	}
	public function kuisioner_mhs_tipe_dua_addNew(){
		$data = $this->input->post(null,TRUE);

		$berhasil = TRUE;
		$pertanyaan_kuisioner = $this->main_model->get_pertanyaan_kuisioner($data['id_kuisioner_judul']);
		foreach($pertanyaan_kuisioner->result() as $pk){
		    $query = $this->main_model->input_kuisioner_mhs_tipe_dua($data['id_kuisioner_judul'], $pk->id_kuisioner_pertanyaan, $data['nim'], $data[$pk->id_kuisioner_pertanyaan]);
		    if($query != 0){
		    	$berhasil = FALSE;
		   	}
		}

		if($berhasil == TRUE){
		    echo "
		    <script>
				alert('Data Kuisioner Berhasil diinput.');
			</script>";
			redirect('main_controller/view_all_judul_kuisioner_mhs/', 'refresh');
		}else{
		    echo "
		    <script>
				alert('Data Kuisioner Gagal diinput!');
			</script>";
			redirect('main_controller/view_all_judul_kuisioner_mhs/', 'refresh');
		}
	}


	    public function view_all_users(){
	    	if ($this->session->level == 1){
		    	$data['user'] = $this->main_model->getUsers();
		    	$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_users';
				$this->load->view('vw_dashboard',$data);
			}else{
				redirect('main_controller/index');
			}
	    }
				//OTHER
	    public function view_storage(){
	    	if ($this->session->level == 1){
	            $data['disk_totalspace']   = $this->main_model->disk_totalspace(DIRECTORY_SEPARATOR);
	            $data['disk_freespace']    = $this->main_model->disk_freespace(DIRECTORY_SEPARATOR);
	            $data['disk_usespace']     = $data['disk_totalspace'] -$data['disk_freespace'];
	            $data['disk_usepercent']   = $this->main_model->disk_usepercent(DIRECTORY_SEPARATOR, FALSE);
	            $data['memory_usage']      = $this->main_model->memory_usage();
	            $data['memory_peak_usage'] = $this->main_model->memory_peak_usage(TRUE);
	            $data['memory_usepercent'] = $this->main_model->memory_usepercent(TRUE, FALSE);
		    	$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'view_system';
				$this->load->view('vw_dashboard',$data);
			}else{
				redirect('main_controller/index');
			}
	    }

	    public function view_database(){
	    	if ($this->session->level == 1){
		    	$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'view_database';
	            $data['list_tables'] = $this->db->list_tables();
	            $data['platform']    = $this->db->platform();
	            $data['version']     = $this->db->version();
				$this->load->view('vw_dashboard',$data);
			}else{
				redirect('main_controller/index');
			}
	    }
	    public function view_all_tahun_akademik(){
	    	if ($this->session->level == 1){
		    	$data['tahun_akademik'] = $this->main_model->getAkademik();

	    		$data['main_sidebar'] = 'sb_admin';
		    	$data['main_content'] = 'vw_all_tahun_akademik';
	    		$this->load->view('vw_dashboard', $data);
	    	}else{
				redirect('main_controller/index');
			}
	    }
	    public function tahunAkademik_addNew(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->input_TahunAkademik($data);
	        if($query != false){
	        	echo "
	        	<script>
					alert('Data Akademik Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/view_all_tahun_akademik', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Akademik Gagal ditambahkan.');
				</script>";
				redirect('main_controller/view_all_tahun_akademik', 'refresh');
	        }
	    }
	    public function redirect_update_tahunakademik($id){
	    	if ($this->session->level == 1){
	    		$data['tahun_akademik'] = $this->main_model->getSatuTahunAkademik($id);

	    		$data['main_sidebar'] = 'sb_admin';
	    		$data['main_content'] = 'vw_edit_tahunakademik';
	    		$this->load->view('vw_dashboard', $data);
			}else{
				redirect('main_controller/index');
			}
	    }
			public function TahunAkademik_update(){
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->update_TahunAkademik($data);
	        if($query){
	        	echo "
	        	<script>
					alert('Data Tahun Akademik Berhasil diubah.');
				</script>";
				redirect('main_controller/view_all_tahun_akademik', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Data Tahun Akademik Gagal diubah.');
				</script>";
				redirect('main_controller/view_all_tahun_akademik', 'refresh');
	        }
	    }
			//------------------------------KEUANGAN---------------------------------------------//
		    public function status_bayar_addNew(){
		    	$data = $this->input->post(null,TRUE);
		        $query = $this->main_model->input_Pembayaran($data);
		        if($query == 0){
		        	echo "
		        	<script>
						alert('Data Pembayaran Berhasil ditambahkan.');
					</script>";
		        }else{
		        	echo "
		        	<script>
						alert('Data Pembayaran Gagal ditambahkan.');
					</script>";
		        }
						$query2 = $this->main_model->addNewRegistrasi($data);
						if($query == 0){
		        	echo "
		        	<script>
						alert('Data Registrasi Berhasil ditambahkan.');
					</script>";
					redirect('main_controller/view_all_status_bayar/1', 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Data Registrasi Gagal ditambahkan.');
					</script>";
					redirect('main_controller/view_all_status_bayar/1', 'refresh');
		        }

		    }
			public function view_all_status_bayar($id){
				if ($this->session->level == 1){
		    		$data['k_status'] = $this->main_model->getStatusPembayaranByOrder($id);
						$data['tahun_akademik'] = $this->main_model->getAkademik();
						$data['mahasiswa'] = $this->main_model->getMahasiswa();
						$data['biaya'] = $this->main_model->getCurrentBiaya();
						$data['id'] = $id;
	    			$data['main_sidebar'] = 'sb_admin';
		    		$data['main_content'] = 'vw_all_statusbayar';
	    			$this->load->view('vw_dashboard', $data);
	    		}else{
					redirect('main_controller/index');
				}
			}

			public function redirect_update_status_bayar($id){
		    	if ($this->session->level == 1){
		    		$data['pembayaran'] = $this->main_model->getSatuPembayaran($id);
		    		$data['k_status'] = $this->main_model->getStatusPembayaran();
						$data['tahun_akademik'] = $this->main_model->getAkademik();
						$data['mahasiswa'] = $this->main_model->getMahasiswa();
						$data['buktipembayaran'] = $this->main_model->getBuktiBayar($data['pembayaran']->row()->buktipembayaran);

	    			$data['main_sidebar'] = 'sb_admin';
		    		$data['main_content'] = 'vw_edit_statusbayar';
	    			$this->load->view('vw_dashboard', $data);
				}
	    	}

			public function status_bayar_update(){
		    	$data = $this->input->post(null,TRUE);
		        $query = $this->main_model->update_Pembayaran($data);
		        if($query){
		        	echo "
		        	<script>
						alert('Data Pembayaran Berhasil diubah.');
					</script>";
					$this->main_model->addNewRegistrasi($data);
					redirect('main_controller/view_all_status_bayar/1', 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Data Pembayaran Gagal diubah.');
					</script>";
					redirect('main_controller/view_all_status_bayar/1', 'refresh');
		        }
	    	}
			//---------------------------END KEUANGAN---------------------------------------------//

			//------------------------------BIAYA---------------------------------------------//
			public function biaya_addNew(){
		    	$data = $this->input->post(null,TRUE);
		        $query = $this->main_model->input_Biaya($data);
		        if($query == 0){
		        	echo "
		        	<script>
						alert('Data Jadwal Kuliah Berhasil ditambahkan.');
					</script>";
					redirect('main_controller/view_all_biaya', 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Biaya tersebut sudah ada!');
					</script>";
					redirect('main_controller/view_all_biaya', 'refresh');
		        }
	    	}
			public function view_all_biaya(){
				if ($this->session->level == 1){
		    		$data['biaya'] = $this->main_model->getBiaya();
					$data['tahun_akademik'] = $this->main_model->getAkademik();
					$data['prodi'] = $this->main_model->getProdi();

	    			$data['main_sidebar'] = 'sb_admin';
		    		$data['main_content'] = 'vw_all_biaya';
	    			$this->load->view('vw_dashboard', $data);
	    		}else{
					redirect('main_controller/index');
				}
			}
			public function redirect_update_biaya($id){
		    	if ($this->session->level == 1){
		    		$data['biaya'] = $this->main_model->getSatuBiaya($id);
					$data['tahun_akademik'] = $this->main_model->getAkademik();
					$data['prodi'] = $this->main_model->getProdi();

	    			$data['main_sidebar'] = 'sb_admin';
		    		$data['main_content'] = 'vw_edit_biaya';
	    			$this->load->view('vw_dashboard', $data);
				}
	    	}

			public function biaya_update(){
		    	$data = $this->input->post(null,TRUE);
		        $query = $this->main_model->update_Biaya($data);
		        if($query){
		        	echo "
		        	<script>
						alert('Data Biaya Berhasil diubah.');
					</script>";
					redirect('main_controller/view_all_biaya', 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Data Biaya Gagal diubah.');
					</script>";
					redirect('main_controller/view_all_biaya', 'refresh');
		        }
	    	}
			//---------------------------END BIAYA---------------------------------------------//

			//---------------------------REGISTRASI----------------------------------------------//
			public function view_all_registrasi(){
	    		if ($this->session->level == 1){
		    		$data['regis'] = $this->main_model->getStatusRegistrasi();

	    			$data['main_sidebar'] = 'sb_admin';
		    		$data['main_content'] = 'vw_all_registrasi';
	    			$this->load->view('vw_dashboard', $data);
	    		}else{
					redirect('main_controller/index');
				}
			}

			public function input_mk_temp($id){
	        $query = $this->main_model->input_temp_mk($id);
	        if($query == 0){
	        	echo "
	        	<script>
					alert('Mata Kuliah Berhasil ditambahkan.');
				</script>";
				redirect('main_controller/view_mhs_registrasimk', 'refresh');
	        }else{
	        	echo "
	        	<script>
					alert('Mata Kuliah tersebut sudah ada!');
				</script>";
				redirect('main_controller/view_mhs_registrasimk', 'refresh');
	        }
	    	}

	    	public function submit_temp_krs(){
	    		$query = $this->main_model->input_temp_krs($this->session->kode_user);
		        if($query){
		        	echo "
		        	<script>
						alert('KRS Sementara Berhasil.');
					</script>";
					redirect('main_controller/view_mhs_registrasimk', 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('KRS Sementara Gagal!');
					</script>";
					redirect('main_controller/view_mhs_registrasimk', 'refresh');
		        }
	    	}
		    public function redirect_update_regis($id){
		    	if ($this->session->level == 1){
						$data['regis'] = $this->main_model->getSatuRegistrasi($id);
						$data['temp_krs'] = $this->main_model->getSpecTemp_krs($data['regis']->row()->nim);

						$data['mahasiswa'] = $this->main_model->getMahasiswa();
						$data['tahun_akademik'] = $this->main_model->getAkademik();

		    		$data['main_sidebar'] = 'sb_admin';
		    		$data['main_content'] = 'vw_edit_regis';
		    		$this->load->view('vw_dashboard', $data);
					}else{
						redirect('main_controller/index');
					}
		    }

		    public function registrasi_update(){
		    	$data = $this->input->post(null,TRUE);
		        $query = $this->main_model->update_Registrasi($data);
		        if($query){
			        if($data['optionsRadios'] == 1){
			        	//pindah tempkrs ke akademik_krs

			        	//get temp_krs
			        	$krs = $this->main_model->getSatuTemp_krs($data['nim']);

			        	//input ke akademik_krs
			        	$berhasil = TRUE;
			        	foreach ($krs->result() as $key) {
			        		$isi['nim'] = $key->nim;
			        		$isi['id_jadwal_master'] = $key->id_jadwal_master;
			        		$isi['semester'] = $key->semester;
			        		$query2 = $this->main_model->input_krs($isi);
				        	if($query2 != 0){
				        		$berhasil = FALSE;
				        	}
			        	}
			        	if($berhasil == TRUE){
			        		//delete temp_krs
			        		$query3 = $this->main_model->deleteSatuTemp_krs($data['nim']);
			        		if($query3){
			        			//tambah semester mhs
			        			$query4 = $this->main_model->tambahSemesterMhs($data['nim']);
			        			if($query4 == 0){
						        	echo "
							        <script>
										alert('Data Registrasi Berhasil diubah.');
									</script>";
									redirect('main_controller/view_all_registrasi', 'refresh');
			        			} else{
						        	echo "
							        <script>
										alert('Data Registrasi Gagal diubah.');
									</script>";
									redirect('main_controller/view_all_registrasi', 'refresh');
			        			}
			        		} else{
					        	echo "
						        <script>
									alert('Data Registrasi Gagal diubah.');
								</script>";
								redirect('main_controller/view_all_registrasi', 'refresh');
			        		}
				        } else{
				        	echo "
					        <script>
								alert('Data Registrasi Gagal diubah.');
							</script>";
							redirect('main_controller/view_all_registrasi', 'refresh');
				        }
			    	} else{
			        	echo "
			        	<script>
							alert('Data Registrasi Berhasil diubah.');
						</script>";
						redirect('main_controller/view_all_registrasi', 'refresh');
			    	}
		        }else{
		        	echo "
		        	<script>
						alert('Data Registrasi Gagal diubah.');
					</script>";
					redirect('main_controller/view_all_registrasi', 'refresh');
		        }
	    	}
			//---------------------------END REGISTRASI-------------------------------------------//

	    	//------------------------START KRS-------------------------------//
	    	public function view_all_krs(){
	    		if ($this->session->level == 1){
		    		$data['regis'] = $this->main_model->getStatusKRS();

	    			$data['main_sidebar'] = 'sb_admin';
		    		$data['main_content'] = 'vw_all_krs';
	    			$this->load->view('vw_dashboard', $data);
	    		}else{
					redirect('main_controller/index');
				}
	    	}
	    	//------------------------END KRS---------------------------------//

	    	//------------------------KUISIONER ADMIN-------------------------------//
	    	//CRUD JUDUL
	    	public function judul_kuisioner_addNew(){
		    	$data = $this->input->post(null,TRUE);
		        $query = $this->main_model->input_Judul_kuisioner($data);
		        if($query != FALSE){
		        	echo "
		        	<script>
						alert('Judul Kuisioner Berhasil ditambahkan.');
					</script>";
					redirect('main_controller/redirect_lihat_pertanyaan_kuisioner/' .$query, 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Judul Kuisioner Gagal ditambahkan.');
					</script>";
					redirect('main_controller/view_all_judul_kuisioner', 'refresh');
		        }
		    }
		    public function view_all_judul_kuisioner(){
		    	if ($this->session->level == 1){
		    		$data['judul_kuisioner'] = $this->main_model->getJudul_kuisioner();
		    		$data['tahun_akademik'] = $this->main_model->getAkademik();

		    		$data['main_sidebar'] = 'sb_admin';
			    	$data['main_content'] = 'vw_all_judul_kuisioner';
		    		$this->load->view('vw_dashboard', $data);
		    	}else{
					redirect('main_controller/index');
				}
		    }
		    public function redirect_update_kuisioner_judul($id_kuisioner_judul){
		    	if ($this->session->level == 1){
		    		$pertanyaan_isFilled = $this->main_model->pertanyaan_isFilled($id_kuisioner_judul);
		    		if($pertanyaan_isFilled == TRUE){
		    			echo "
			        	<script>
							alert('Anda tidak bisa mengubah judul tersebut karena anda sudah mengisi pertanyaan!');
						</script>";
						redirect('main_controller/view_all_judul_kuisioner', 'refresh');
		    		} else{
			    		$data['kuisioner_judul'] = $this->main_model->get_satu_judul_kuisioner($id_kuisioner_judul);
		    			$data['tahun_akademik'] = $this->main_model->getAkademik();

			    		$data['main_sidebar'] = 'sb_admin';
			    		$data['main_content'] = 'vw_edit_kuisioner_judul';
			    		$this->load->view('vw_dashboard', $data);
					}
				} else{
					redirect('main_controller/index');
				}
		    }
		    public function kuisioner_judul_update(){
		    	$data = $this->input->post(null,TRUE);
		        $query = $this->main_model->update_kuisioner_judul($data);
		        if($query == TRUE){
		        	echo "
		        	<script>
						alert('Judul Kuisioner Berhasil diubah.');
					</script>";
					redirect('main_controller/view_all_judul_kuisioner', 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Judul Kuisioner Gagal diubah.');
					</script>";
					redirect('main_controller/view_all_judul_kuisioner', 'refresh');
		        }
		    }
		    public function kuisioner_judul_delete($id_kuisioner_judul){
		        $query = $this->main_model->del_kuisioner_judul($id_kuisioner_judul);
		        if($query == TRUE){
		        	echo "
		        	<script>
						alert('Judul Kuisioner Berhasil dihapus.');
					</script>";
					redirect('main_controller/view_all_judul_kuisioner', 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Judul Kuisioner Gagal dihapus!');
					</script>";
					redirect('main_controller/view_all_judul_kuisioner', 'refresh');
		        }
		    }

		    //PERTANYAAN
		    public function pertanyaan_kuisioner_addNew(){
			    $data = $this->input->post(null,TRUE);
		    	$hasil_kuisioner_isFilled = $this->main_model->judul_kuisioner_isFilled($data['id_kuisioner_judul']);
		    	if($hasil_kuisioner_isFilled == TRUE){
		    		echo "
			        <script>
						alert('Anda tidak bisa menambah pertanyaan lagi karena kuisioner tersebut sudah diisi!');
					</script>";
					redirect('main_controller/redirect_lihat_pertanyaan_kuisioner/' .$data['id_kuisioner_judul'], 'refresh');
		    	} else{
			    	$data = $this->input->post(null,TRUE);
			        $query = $this->main_model->input_pertanyaan_kuisioner($data);
			        if($query == 0){
			        	echo "
			        	<script>
							alert('Pertanyaan Kuisioner Berhasil ditambahkan.');
						</script>";
						redirect('main_controller/redirect_lihat_pertanyaan_kuisioner/' .$data['id_kuisioner_judul'], 'refresh');
			        }else{
			        	echo "
			        	<script>
							alert('Pertanyaan Kuisioner Gagal ditambahkan.');
						</script>";
						redirect('main_controller/redirect_lihat_pertanyaan_kuisioner/' .$data['id_kuisioner_judul'], 'refresh');
			        }
		    	}
		    }
		    public function redirect_lihat_pertanyaan_kuisioner($id_kuisioner_judul){
		    	if ($this->session->level == 1){
		    		$data['kuisioner_judul'] = $this->main_model->get_satu_judul_kuisioner($id_kuisioner_judul);
		    		$data['kuisioner_pertanyaan'] = $this->main_model->get_pertanyaan_kuisioner($id_kuisioner_judul);

		    		$data['main_sidebar'] = 'sb_admin';
			    	$data['main_content'] = 'vw_all_pertanyaan_kuisioner';
		    		$this->load->view('vw_dashboard', $data);
		    	}else{
					redirect('main_controller/index');
				}
		    }
		    public function redirect_update_kuisioner_pertanyaan($id_kuisioner_pertanyaan, $id_kuisioner_judul){
		    	if ($this->session->level == 1){
		    		$hasil_kuisioner_isFilled = $this->main_model->hasil_kuisioner_isFilled($id_kuisioner_judul, $id_kuisioner_pertanyaan);
		    		if($hasil_kuisioner_isFilled == TRUE){
		    			echo "
			        	<script>
							alert('Anda tidak bisa mengubah pertanyaan tersebut karena kuisioner tersebut sudah diisi!');
						</script>";
						redirect('main_controller/view_all_judul_kuisioner', 'refresh');
		    		} else{
			    		$data['kuisioner_judul'] = $this->main_model->get_satu_judul_kuisioner($id_kuisioner_judul);
		    			$data['kuisioner_pertanyaan'] = $this->main_model->get_satu_kuisioner_pertanyaan($id_kuisioner_pertanyaan);

			    		$data['main_sidebar'] = 'sb_admin';
			    		$data['main_content'] = 'vw_edit_kuisioner_pertanyaan';
			    		$this->load->view('vw_dashboard', $data);
					}
				} else{
					redirect('main_controller/index');
				}
		    }
		    public function kuisioner_pertanyaan_update(){
		    	$data = $this->input->post(null,TRUE);
		        $query = $this->main_model->update_kuisioner_pertanyaan($data);
		        if($query == TRUE){
		        	echo "
		        	<script>
						alert('Pertanyaan Kuisioner Berhasil diubah.');
					</script>";
					redirect('main_controller/redirect_lihat_pertanyaan_kuisioner/' .$data['id_kuisioner_judul'], 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Pertanyaan Kuisioner Gagal diubah.');
					</script>";
					redirect('main_controller/redirect_lihat_pertanyaan_kuisioner/' .$data['id_kuisioner_judul'], 'refresh');
		        }
		    }
		    public function pertanyaan_kuisioner_delete($id_kuisioner_pertanyaan, $id_kuisioner_judul){
		        $query = $this->main_model->del_kuisioner_pertanyaan($id_kuisioner_pertanyaan);
		        if($query == TRUE){
		        	echo "
		        	<script>
						alert('Pertanyaan tersebut berhasil dihapus.');
					</script>";
					redirect('main_controller/redirect_lihat_pertanyaan_kuisioner/' .$id_kuisioner_judul, 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Pertanyaan tersebut gagal dihapus!');
					</script>";
					redirect('main_controller/redirect_lihat_pertanyaan_kuisioner/' .$id_kuisioner_judul, 'refresh');
		        }
		    }

		    //HASIL
		    public function view_pilih_tipe_kuisioner(){
		    	if ($this->session->level == 1){

		    		$data['main_sidebar'] = 'sb_admin';
			    	$data['main_content'] = 'vw_pilih_tipe_kuisioner';
		    		$this->load->view('vw_dashboard', $data);
		    	}else{
					redirect('main_controller/index');
				}
		    }
		    public function view_pilih_tipe_kuisioner_tipe_satu(){
		    	if ($this->session->level == 1){

		    		$data['main_sidebar'] = 'sb_admin';
			    	$data['main_content'] = 'vw_pilih_tipe_kuisioner_tipe_satu';
		    		$this->load->view('vw_dashboard', $data);
		    	}else{
					redirect('main_controller/index');
				}
		    }
		    public function redirect_tipe_kuisioner(){
		    	if ($this->session->level == 1){
		    		$data['kuisioner_tipe_dua'] = $this->main_model->get_judul_kuisioner_by_tipe($tipe);

			    	$data['main_sidebar'] = 'sb_admin';
				    $data['main_content'] = 'vw_list_kuisioner_tipe_dua';
			    	$this->load->view('vw_dashboard', $data);
		    	}else{
					redirect('main_controller/index');
				}
		    }
		    public function view_list_kuisioner_by_jadwal_master(){
				if ($this->session->level == 1){
		    		$data['jadwal_master'] = $this->main_model->getJadwal_master();

			    	$data['main_sidebar'] = 'sb_admin';
				    $data['main_content'] = 'vw_hasil_kuisioner_list_jadwal_master';
			    	$this->load->view('vw_dashboard', $data);
				} else{
					redirect('main_controller/index');
				}
		    }
		    public function view_list_kuisioner_by_dosen(){
				if ($this->session->level == 1){
		    		$data['dosen'] = $this->main_model->getDosen();

			    	$data['main_sidebar'] = 'sb_admin';
				    $data['main_content'] = 'vw_hasil_kuisioner_list_dosen';
			    	$this->load->view('vw_dashboard', $data);
				} else{
					redirect('main_controller/index');
				}
		    }
		    public function redirect_hasil_kuisioner_per_jadwal_master($id_jadwal_master){
				if ($this->session->level == 1){
			    	$data['kuisioner'] = $this->main_model->get_hasil_kuisioner_by_jadwal($id_jadwal_master);
				    $data['pertanyaan_kuisioner'] = $this->main_model->get_pertanyaan_kuisioner($data['kuisioner']->row()->id_kuisioner_judul);

				   	$data['main_sidebar'] = 'sb_admin';
			    	$data['main_content'] = 'vw_lihat_hasil_kuisioner_tipe_satu';
				   	$this->load->view('vw_dashboard', $data);
				} else{
					redirect('main_controller/index');
				}
		    }
		    public function redirect_hasil_kuisioner_per_dosen($nidn){
				if ($this->session->level == 1){
					//cek udah diisi ato blm
					$query = $this->main_model->kuisioner_hasil_tipe_satu_dosen_isFilled($nidn);
					if($query != FALSE){
				    	$data['kuisioner'] = $query;
					    $data['pertanyaan_kuisioner'] = $this->main_model->get_pertanyaan_kuisioner($data['kuisioner']->row()->id_kuisioner_judul);

					   	$data['main_sidebar'] = 'sb_mhs';
				    	$data['main_content'] = 'vw_lihat_hasil_kuisioner_tipe_satu';
					   	$this->load->view('vw_dashboard', $data);
					} else{
						//redirect ke input kuisioner
						echo "
			        	<script>
							alert('Belum ada koresponden!');
						</script>";
						redirect('main_controller/view_list_kuisioner_by_dosen/', 'refresh');
					}
				} else{
					redirect('main_controller/index');
				}
		    }
		    public function redirect_hasil_kuisioner_tipe_dua($id_kuisioner_judul){
				if ($this->session->level == 1){
					//cek udah diisi ato blm
					if($this->main_model->kuisioner_hasil_tipe_dua_isFilled($id_kuisioner_judul) == TRUE){
						$data['kuisioner'] = $this->main_model->get_hasil_kuisioner_tipe_dua($id_kuisioner_judul);
					    $data['pertanyaan_kuisioner'] = $this->main_model->get_pertanyaan_kuisioner($id_kuisioner_judul);

					   	$data['main_sidebar'] = 'sb_mhs';
				    	$data['main_content'] = 'vw_lihat_hasil_kuisioner_tipe_dua';
					   	$this->load->view('vw_dashboard', $data);
					} else{
						//redirect ke input kuisioner
						echo "
			        	<script>
							alert('Belum ada koresponden!');
						</script>";
						redirect('main_controller/redirect_tipe_kuisioner/2', 'refresh');
					}
				}else{
					redirect('main_controller/index');
				}
		    }
	    	//------------------------END KUISIONER ADMIN---------------------------------//

	    	//-----------------------------DOSEN---------------------------------------------//
				public function view_dsn_jadwaldosen(){
				  if ($this->session->level == 2){
				    $data['jadwal_dosen'] = $this->main_model->getJadwal_Dsn();
				    $data['main_sidebar'] = 'sb_dsn';
				    $data['main_content'] = 'vw_dsn_jadwaldosen';
				    $this->load->view('vw_dashboard', $data);
				  }else{
				  redirect('main_controller/index');
				}
				}
				public function view_dsn_editprofil(){
			        if ($this->session->level == 2) {
			            $data['dosen'] = $this->main_model->getSatuDosen($this->session->kode_user);
			            $data['prodi'] = $this->main_model->getProdi();
			            $data['agama'] = $this->main_model->getAgama();

			            $data['main_sidebar'] = 'sb_dsn';
			            $data['main_content'] = 'vw_dsn_editprofil';
			            $this->load->view('vw_dashboard',$data);
			        } else{
			         	redirect('main_controller/index');
			        }
			    }
			    public function dsn_dsn_editprofil(){
			        $data = $this->input->post(null,TRUE);
			        $query = $this->main_model->update_Dosen_Dosen($data);
			        if($query){
			        	echo "
			            <script>
			          		alert('Data dosen Berhasil diubah.');
			        	</script>";
			        	redirect('main_controller/view_dsn_editprofil', 'refresh');
			        }else{
			           	echo "
			            <script>
			          		alert('Data Dosen Gagal diubah.');
			        	</script>";
			        	redirect('main_controller/view_dsn_editprofil', 'refresh');
			        }
			    }
				 public function view_dsn_gantipassword(){
				  if ($this->session->level == 2) {
				   $data['main_sidebar'] = 'sb_dsn';
				   $data['main_content'] = 'vw_dsn_gantipassword';
				   $this->load->view('vw_dashboard',$data);
				  } else{
					redirect('main_controller/index');
				  }
				 }

				 public function view_dsn_kehadiran(){
				  if ($this->session->level == 2){
				   $data['main_sidebar'] = 'sb_dsn';
				   $data['main_content'] = 'vw_dsn_kehadiran';
				   $this->load->view('vw_dashboard', $data);
				  }
				 }
				 public function view_dsn_inputkehadiranmhs(){
				  if ($this->session->level == 2){
				   $data['main_sidebar'] = 'sb_dsn';
				   $data['main_content'] = 'vw_dsn_inputkehadiranmhs';
				   $this->load->view('vw_dashboard', $data);
				  }
				 }
				 public function view_dsn_lihatkehadiranmhs(){
				  if ($this->session->level == 2){
				   $data['main_sidebar'] = 'sb_dsn';
				   $data['main_content'] = 'vw_dsn_lihatkehadiranmhs';
				   $this->load->view('vw_dashboard', $data);
				  }
				 }

			//CRUD NILAI
			public function view_dsn_inputnilai(){
				if ($this->session->level == 2){
					$data['jadwal_dosen'] = $this->main_model->getJadwalDsn_master();

					$data['main_sidebar'] = 'sb_dsn';
					$data['main_content'] = 'vw_dsn_nilai';
					$this->load->view('vw_dashboard', $data);
				} else{
					redirect('main_controller/index');
				}
			}
			public function redirect_input_nilai($id){
				if ($this->session->level == 2){
					$data['mhs'] = $this->main_model->getMhsByJadwalAtKrs($id);

					$data['main_sidebar'] = 'sb_dsn';
				    $data['main_content'] = 'vw_dsn_input_nilai';
				   	$this->load->view('vw_dashboard', $data);
				} else{
					redirect('main_controller/index');
				}
			}
			public function redirect_update_nilai($id){
				if ($this->session->level == 2){
					$data['jadwal'] = $this->main_model->getMhsByJadwalAtKrs($id);
					$data['mhs'] = $this->main_model->getMhsAtNilai($id);

					$data['main_sidebar'] = 'sb_dsn';
				   	$data['main_content'] = 'vw_dsn_update_nilai';
			   		$this->load->view('vw_dashboard', $data);
				} else{
					redirect('main_controller/index');
				}
			}
			public function nilai_addNew(){
		    	$data = $this->input->post(null,TRUE);

		    	$berhasil = TRUE;
		    	$mahasiswa = $this->main_model->getMhsByJadwalAtKrs($data['id_jadwal_master']);
		    	foreach($mahasiswa->result() as $mhs){
		    		$query = $this->main_model->input_Nilai($data['id_jadwal_master'], $mhs->nim, $data[$mhs->nim]);
		    		if($query != 0){
		    			$berhasil = FALSE;
		    		}
		    	}

		    	if($berhasil == TRUE){
		    		$query2 = $this->main_model->nilai_isFilled($data['id_jadwal_master']);
		    		if($query2 != 0){
		    			$berhasil = FALSE;
		    		}
		    	}

		        if($berhasil == TRUE){
		        	echo "
		        	<script>
						alert('Data Nilai Berhasil ditambahkan.');
					</script>";
					redirect('main_controller/view_dsn_inputnilai/', 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Data Nilai Gagal ditambahkan!');
					</script>";
					redirect('main_controller/view_dsn_inputnilai/', 'refresh');
		        }
	    	}
	    	public function nilai_update(){
	    		$data = $this->input->post(null,TRUE);
		    	$berhasil = TRUE;
		    	$mahasiswa = $this->main_model->getMhsByJadwalAtKrs($data['id_jadwal_master']);
		    	foreach($mahasiswa->result() as $mhs){
		    		$query = $this->main_model->update_Nilai($data['id_jadwal_master'], $mhs->nim, $data[$mhs->nim]);
		    		if($query != 0){
		    			$berhasil = FALSE;
		    		}
		    	}

		        if($berhasil == TRUE){
		        	echo "
		        	<script>
						alert('Data Nilai Berhasil diubah.');
					</script>";
					redirect('main_controller/view_dsn_inputnilai/', 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Data Nilai Gagal diubah!');
					</script>";
					redirect('main_controller/view_dsn_inputnilai/', 'refresh');
		        }
	    	}

			//CRUD PRESENSI DAN KEHADIRAN
	    	public function redirect_view_presensi($id_jadwal_matkul){
		    	if ($this->session->level == 2){
		    		$data['jadwal_dosen'] = $this->main_model->getPresensi($id_jadwal_matkul);
						$data['id_jadwal'] = $id_jadwal_matkul;

		    		$data['main_sidebar'] = 'sb_dsn';
		    		$data['main_content'] = 'vw_dsn_presensi';
		    		$this->load->view('vw_dashboard', $data);
				} else{
					redirect('main_controller/index');
				}
	    	}
	    	public function presensi_addNew(){
		    	$data = $this->input->post(null,TRUE);
		        $query = $this->main_model->input_Presensi($data);
		        if($query != false){
				    echo "
				    <script>
						alert('Data Presensi Berhasil ditambahkan.');
					</script>";
					redirect('main_controller/redirect_input_kehadiran/' .$query, 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Presensi dengan Pertemuan tersebut sudah ada!');
					</script>";
					redirect('main_controller/redirect_view_presensi/' .$data['id_jadwal_matkul'], 'refresh');
		        }
	    	}
	    	public function redirect_input_kehadiran($id){
		    	if ($this->session->level == 2){
		    		$data['jadwal'] = $this->main_model->getSatuPresensi($id);
		    		$data['mahasiswa'] = $this->main_model->getPresensiMhs($id);

		    		$data['main_sidebar'] = 'sb_dsn';
		    		$data['main_content'] = 'vw_dsn_input_kehadiran';
		    		$this->load->view('vw_dashboard', $data);
				}else{
					redirect('main_controller/index');
				}
	    	}
	    	public function kehadiran_addNew(){
		    	$data = $this->input->post(null,TRUE);

		    	$berhasil = TRUE;
		    	$mahasiswa = $this->main_model->getPresensiMhs($data['id_presensi']);
		    	foreach($mahasiswa->result() as $mhs){
		    		$query = $this->main_model->input_Kehadiran($data['id_presensi'], $mhs->nim, $data[$mhs->nim]);
		    		if($query != 0){
		    			$berhasil = FALSE;
		    		}
		    	}

		    	if($berhasil == TRUE){
		    		$query2 = $this->main_model->presensi_isFilled($data['id_presensi']);
		    		if($query2 != 0){
		    			$berhasil = FALSE;
		    		}
		    	}

		        if($berhasil == TRUE){
		        	echo "
		        	<script>
						alert('Data Kehadiran Berhasil diubah.');
					</script>";
					redirect('main_controller/redirect_view_presensi/' .$data['id_jadwal_matkul'], 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Data Kehadiran Gagal diubah!');
					</script>";
					redirect('main_controller/redirect_view_presensi/' .$data['id_jadwal_matkul'], 'refresh');
		        }
	    	}
	    	public function redirect_update_kehadiran($id){
		    	if ($this->session->level == 2){
		    		$data['jadwal'] = $this->main_model->getSatuPresensi($id);
		    		$data['mahasiswa'] = $this->main_model->getKehadiranMHS($id);

		    		$data['main_sidebar'] = 'sb_dsn';
		    		$data['main_content'] = 'vw_dsn_update_kehadiran';
		    		$this->load->view('vw_dashboard', $data);
				}else{
					redirect('main_controller/index');
				}
	    	}
	    	public function kehadiran_update(){
	    		$data = $this->input->post(null,TRUE);
		    	$berhasil = TRUE;
		    	$mahasiswa = $this->main_model->getPresensiMhs($data['id_presensi']);
		    	foreach($mahasiswa->result() as $mhs){
		    		$query = $this->main_model->update_Kehadiran($data['id_presensi'], $mhs->nim, $data[$mhs->nim]);
		    		if($query != 0){
		    			$berhasil = FALSE;
		    		}
		    	}

		        if($berhasil == TRUE){
		        	echo "
		        	<script>
						alert('Data Kehadiran Berhasil diubah.');
					</script>";
					redirect('main_controller/redirect_view_presensi/' .$data['id_jadwal_matkul'], 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Data Kehadiran Gagal diubah!');
					</script>";
					redirect('main_controller/redirect_view_presensi/' .$data['id_jadwal_matkul'], 'refresh');
		        }
	    	}
	    	public function presensi_delete($id_presensi, $id_jadwal_matkul){
	    		$query = $this->main_model->del_Presensi($id_presensi);

	    		if($query == TRUE){
		        	echo "
		        	<script>
						alert('Data Kehadiran Berhasil dihapus.');
					</script>";
					redirect('main_controller/redirect_view_presensi/' .$id_jadwal_matkul, 'refresh');
		        }else{
		        	echo "
		        	<script>
						alert('Data Kehadiran Gagal dihapus!');
					</script>";
					redirect('main_controller/redirect_view_presensi/' .$id_jadwal_matkul, 'refresh');
		        }
	    	}

	    	//---------------------------END DOSEN-------------------------------------------//
				//------------------------------NEW-------------//
			public function pg_biodata_mhs($nim){
			 if ($this->session->level == 1){
				 $data['mahasiswa'] = $this->main_model->getSatuMahasiswa($nim);
				 // $data['pekerjaan'] = $this->main_model->getPekerjaan();
				 $data['prodi'] = $this->main_model->getProdi();
				 // $data['angkatan'] = $this->main_model->getNamaSatuAngkatan();
				 // $data['kelas'] = $this->main_model->getKelas();
				 // $data['agama'] = $this->main_model->getAgama();
				 $this->load->view('pg_print_biodatamhs', $data);
		 }else{
			 redirect('main_controller/index');
		 }
		 }

		 public function pg_biodata_dsn($nidn){
			 if ($this->session->level == 1){
				 $data['dosen'] = $this->main_model->getSatuDosen($nidn);


				 $this->load->view('pg_print_biodatdsn', $data);
		 }else{
			 redirect('main_controller/index');
		 }
		 }

		 public function pg_mhs_jadwalkuliah($nim){
		   if ($this->session->level == 3 || $this->session->level == 1){
				 $data['mahasiswa'] = $this->main_model->getSatuMahasiswa($nim);
		     $data['jadwalmhs'] = $this->main_model->getJadwalMhs_ksm($nim);
		     $this->load->view('pg_print_jadwalmhs', $data);
		   }else{
		   redirect('main_controller/index');
		 }
		 }
		 public function pg_mhs_jadwalujian($nim){
			 if ($this->session->level == 3) {
				 $data['mahasiswa'] = $this->main_model->getSatuMahasiswa($nim);
				 $data['jadwalmhs'] = $this->main_model->getJadwal_ujian_Mhs();
				 $this->load->view('pg_print_ujianmhs',$data);
			 }else{
			 		redirect('main_controller/index');
		 	}
		 }

		  public function pg_print_khs($nim){
			  if ($this->session->level == 1 ||$this->session->level == 3) {
						$data['nilaimhs'] = $this->main_model->getKhs_Mhs($nim);
						$data['nilaimhsngulang'] = $this->main_model->getKhs_Mhs_ngulang($nim);
						$data['ips'] = $this->main_model->getNilai_IPS();
						$data['ipk'] = $this->main_model->getNilai_IPK();
						 $data['mahasiswa'] = $this->main_model->getSatuMahasiswa($nim);
			    		$this->load->view('pg_print_khs',$data);
			    	}else{
						redirect('main_controller/index');
					}
			}
		 public function view_mhs_materi_download(){
		 if ($this->session->level == 3){
		    $data['jadwal'] = $this->main_model->getJadwalMhs_master();

		    $data['main_sidebar'] = 'sb_mhs';
		    $data['main_content'] = 'vw_mhs_materi_download';

		    $this->load->view('vw_dashboard', $data);
		 }else{
		  redirect('main_controller/index');
		 }
		 }

		 public function view_mhs_materi_upload(){
		 if ($this->session->level == 3){
		  $data['jadwal'] = $this->main_model->getJadwalMhs_master();

		    $data['main_sidebar'] = 'sb_mhs';
		    $data['main_content'] = 'vw_mhs_materi_upload';

		    $this->load->view('vw_dashboard', $data);
		 }else{
		  redirect('main_controller/index');
		 }
		 }

		 public function view_dsn_materi_downloadjawaban(){
		 if ($this->session->level == 2){
		  $data['jadwal'] = $this->main_model->getJadwalDsn_master();
		  $data['tahun_akademik'] = $this->main_model->getAkademik();
		  $data['matkul'] = $this->main_model->getMK();
		  $data['prodi'] = $this->main_model->getProdi();
		  $data['dosen'] = $this->main_model->getDosen();

		    $data['main_sidebar'] = 'sb_dsn';
		    $data['main_content'] = 'vw_dsn_materi_downloadjawaban';
		    $this->load->view('vw_dashboard', $data);
		 }else{
		  redirect('main_controller/index');
		 }
		 }

		 public function view_dsn_materi_upload(){
		    if ($this->session->level == 2){
		        $data['jadwal'] = $this->main_model->getJadwalDsn_master();
		        $data['tahun_akademik'] = $this->main_model->getAkademik();
		        $data['matkul'] = $this->main_model->getMK();
		        $data['prodi'] = $this->main_model->getProdi();
		        $data['dosen'] = $this->main_model->getDosen();

		        $data['main_sidebar'] = 'sb_dsn';
		        $data['main_content'] = 'vw_dsn_materi_upload';
		        $this->load->view('vw_dashboard', $data);
		    }else{
		      redirect('main_controller/index');
		    }
		 }
		 public function redirect_upload_materi($id){
		    if ($this->session->level == 2){
		        $data['materi'] = $this->main_model->getMateri($id);
		        $data['kelas'] = $this->main_model->get_satu_jadwal_master($id);
		        $data['id_jadwal'] = $id;

		        $data['main_sidebar'] = 'sb_dsn';
		        $data['main_content'] = 'vw_dsn_materi_kelas';
		        $this->load->view('vw_dashboard', $data);
		    }else{
		      redirect('main_controller/index');
		    }
		 }
		 public function redirect_download_materi($id){
		    if ($this->session->level == 3){
		        $data['materi'] = $this->main_model->getMateri($id);
		        $data['kelas'] = $this->main_model->get_satu_jadwal_master($id);
		        $data['id_jadwal'] = $id;

		        $data['main_sidebar'] = 'sb_mhs';
		        $data['main_content'] = 'vw_mhs_materi_kelas';
		        $this->load->view('vw_dashboard', $data);
		    }else{
		      redirect('main_controller/index');
		    }
		 }
		 public function redirect_new_tugas($id)
		 {
		   if ($this->session->level == 2){
		      $data['tugas'] = $this->main_model->getTugas($id);
		      $data['kelas'] = $this->main_model->get_satu_jadwal_master($id);
		      $data['id_jadwal'] = $id;

		      $data['main_sidebar'] = 'sb_dsn';
		      $data['main_content'] = 'vw_dsn_tugas_kelas';
		      $this->load->view('vw_dashboard', $data);
		  }else{
		    redirect('main_controller/index');
		  }
		 }
		 public function redirect_uploaded_tugas($id)
		 {
		   if ($this->session->level == 2){
		      $data['tugas'] = $this->main_model->getHasilTugas($id);
		      $data['main_sidebar'] = 'sb_dsn';
		      $data['main_content'] = 'vw_dsn_tugas_kelas_hasil';
		      $this->load->view('vw_dashboard', $data);
		  }else{
		    redirect('main_controller/index');
		  }
		 }
		 public function redirect_lihat_tugas($id){
		    if ($this->session->level == 3){
		      $data['tugas'] = $this->main_model->getTugas($id);
		      $data['kelas'] = $this->main_model->get_satu_jadwal_master($id);
		      $data['id_jadwal'] = $id;

		        $data['main_sidebar'] = 'sb_mhs';
		        $data['main_content'] = 'vw_mhs_tugas_kelas';
		        $this->load->view('vw_dashboard', $data);
		    }else{
		      redirect('main_controller/index','refresh');
		    }
		 }
		 public function changepass()
	    {
	    	$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->updatePass($data);
	        if($query){
	        	echo "<script> alert('Password berhasil diubah.');</script>";
		    	redirect('main_controller/logout','refresh');
	  		}else{
	  			echo "
		    <script>
		      alert('Password gagal diubah.');
		    </script>";
		    redirect('main_controller/dashboard','refresh');
	  		}
	    }
			public function resetPwd($id)
			{
				$query = $this->main_model->resetPass($id);
				if($query){
					echo "<script> alert('Password berhasil direset.');</script>";
				}else{
					echo "<script> alert('Password gagal direset.');</script>";
				}
				redirect('main_controller/view_all_users','refresh');
			}
			public function event_addNew() {
					$data = $this->input->post(null,TRUE);
	        $query = $this->main_model->addNewEvent($data);
	        if($query){
	        	echo "<script> alert('Kegiatan berhasil ditambahkan.');</script>";
		    		redirect('main_controller/dashboard','refresh');
		  		}else{
		  			echo "<script>alert('Kegiatan gagal ditambahkan.');</script>";
			    	redirect('main_controller/dashboard','refresh');
		  		}
			}
			public function del_event($id)
			{
				$query = $this->main_model->eventDelete($id);
				if($query){
					echo "<script> alert('Kegiatan berhasil dihapus.');</script>";
					redirect('main_controller/dashboard','refresh');
				}else{
					echo "<script>alert('Kegiatan gagal dihapus.');</script>";
					redirect('main_controller/dashboard','refresh');
				}
			}
			public function del_materi($id){
				$query = $this->main_model->materiDelete($id);
				if($query){
					echo "<script> alert('Materi berhasil dihapus.');</script>";
					redirect('main_controller/view_dsn_materi_upload','refresh');
				}else{
					echo "<script>alert('Materi gagal dihapus.');</script>";
					redirect('main_controller/view_dsn_materi_upload','refresh');
				}
			}
			public function del_tgs($id){
				$query = $this->main_model->tugasDelete($id);
				if($query){
					echo "<script> alert('Tugas berhasil dihapus.');</script>";
					redirect('main_controller/view_dsn_materi_downloadjawaban','refresh');
				}else{
					echo "<script>alert('Tugas gagal dihapus.');</script>";
					redirect('main_controller/view_dsn_materi_downloadjawaban','refresh');
				}
			}
	}
?>
