<?php
	class Main_model extends CI_Model{
		public $kode_user;
		public $display_name;
		public $level;
		public $id_kelas;
		public $id_gedung;
		public $id_prodi;
		public $tahun_akademik;

		function __construct(){
			//$this->load->database();
			parent::__construct();
		}

		function validate($data){
	        $result = $this->db->get_where('tbl_users',array('username'=> $data['username'],'password'=>md5($data['password'])));
					if ($result->num_rows()==1) {
						if ($result->row()->level == 3) {
							$getNIM = $this->db->get_where('tbl_mahasiswa',array('nim'=>$result->row()->kode_user));
			        $this->id_kelas = $getNIM->row()->id_kelas;
							$this->id_prodi = $getNIM->row()->kampus_prodi;
							$this->kode_user = $result->row()->kode_user;
							$this->display_name = $result->row()->display_name;
							$this->level = $result->row()->level;
						}else if ($result->row()->level == 2) {
							$getNIM = $this->db->get_where('tbl_dosen',array('nidn'=>$result->row()->kode_user));
							$this->id_prodi = $getNIM->row()->prodi_id;
							$this->kode_user = $result->row()->kode_user;
							$this->display_name = $result->row()->display_name;
							$this->level = $result->row()->level;
						}else if ($result->row()->level == 1) {
							$this->kode_user = $result->row()->kode_user;
							$this->display_name = $result->row()->display_name;
							$this->level = $result->row()->level;
						}
						return $result->row(0);
					}else{
						return 0;
					}
	    }

	    //CRUD MAHASISWA
	    function input_MHS($data){
			$this->db->where('nim',$data['nim']);
	        $result = $this->db->get('tbl_mahasiswa');

	        if($result->num_rows() == 1){
	        	return 1;
	        }else{
				$new_member_insert_data = array(
					'nim' => $data['nim'],
					'nama' => $data['nama'],
					'angkatan_id' => $data['angkatan'],
					'alamat' => $data['alamat'],
					'gender' => $data['optionsRadios'],
					'agama_id' => $data['agama'],
					'tempat_lahir' => $data['tmpt_lahir'],
					'tanggal_lahir' => $data['tgl_lahir'],
					'nama_ibu' => $data['nama_ibu'],
					'nama_ayah' => $data['nama_ayah'],
					'no_hp_ortu' => $data['no_telp'],
					'pekerjaan_id_ibu' => $data['ID_p_ibu'],
					'pekerjaan_id_ayah' => $data['ID_p_bpk'],
					'alamat_ayah' => $data['alamat_ayah'],
					'alamat_ibu' => $data['alamat_ibu'],
					'penghasilan_ayah' => $data['hasil_ayah'],
					'penghasilan_ibu' => $data['hasil_ibu'],
					'sekolah_nama' => $data['nama_sekolah'],
					'sekolah_telpon' => $data['notelp_sekolah'],
					'sekolah_alamat' => $data['alamat_sekolah'],
					'sekolah_jurusan' => $data['jurusan'],
					'sekolah_tahun_lulus' => $data['tahunlulus'],
					'kampus_prodi' => $data['programstudi'],
					'id_kelas' => $data['id_kelas'],
					'semester_aktif' => $data['semester_aktif'],
					'status_mahasiswa' => 1,
					'foto_profil' => 0
				);

				$insert = $this->db->insert('tbl_mahasiswa', $new_member_insert_data);
				return 0;
	        }
		}
		function insert_into_app_kelas_mhs($data){
			$new_member_insert_data = array(
				'id_mhs' => $data['nim'],
				'id_kelas' => $data['id_kelas']
			);

			$insert = $this->db->insert('app_kelas_mhs', $new_member_insert_data);
			return $insert;
		}
		function delete_app_kelas_mhs($data){
			$this->db->where('id_mhs', $data);
		 	$query = $this->db->delete('app_kelas_mhs');
		  	return $query;
		}
		function generate_MHSuser($data){
			$pwd = 'pwd';
			$new_account = array(
				'kode_user'  => $data['nim'],
				'display_name' => $data['nama'],
				'username' => $data['nim'],
				'password' => md5($pwd . $data['nim']),
				'level' => 3
			);
			$insertUser = $this->db->insert('tbl_users', $new_account);
			return $insertUser;
		}
		function getMahasiswa(){
				$query = $this->db
					->select('tbl_mahasiswa.*,akademik_angkatan.*,akademik_prodi.*,akademik_kelas.*')
					->join('akademik_angkatan','tbl_mahasiswa.angkatan_id = akademik_angkatan.id_angkatan')
					->join('akademik_prodi','tbl_mahasiswa.kampus_prodi = akademik_prodi.id_prodi')
					->join('akademik_kelas','tbl_mahasiswa.id_kelas = akademik_kelas.id_kelas')
					->get('tbl_mahasiswa');
        	return $query;
		}
		function getMahasiswaByOrder($id){
				if ($id == 1) {
					$query = $this->db
						->select('tbl_mahasiswa.*,akademik_angkatan.*,akademik_prodi.*,akademik_kelas.*')
						->join('akademik_angkatan','tbl_mahasiswa.angkatan_id = akademik_angkatan.id_angkatan')
						->join('akademik_prodi','tbl_mahasiswa.kampus_prodi = akademik_prodi.id_prodi')
						->join('akademik_kelas','tbl_mahasiswa.id_kelas = akademik_kelas.id_kelas')
						->get('tbl_mahasiswa');
				}
				else if ($id == 2) {
					$query = $this->db
						->select('tbl_mahasiswa.*,akademik_angkatan.*,akademik_prodi.*,akademik_kelas.*')
						->join('akademik_angkatan','tbl_mahasiswa.angkatan_id = akademik_angkatan.id_angkatan')
						->join('akademik_prodi','tbl_mahasiswa.kampus_prodi = akademik_prodi.id_prodi')
						->join('akademik_kelas','tbl_mahasiswa.id_kelas = akademik_kelas.id_kelas')
						->where('tbl_mahasiswa.status_mahasiswa', 1)
						->get('tbl_mahasiswa');
				}else if ($id == 3) {
					$query = $this->db
						->select('tbl_mahasiswa.*,akademik_angkatan.*,akademik_prodi.*,akademik_kelas.*')
						->join('akademik_angkatan','tbl_mahasiswa.angkatan_id = akademik_angkatan.id_angkatan')
						->join('akademik_prodi','tbl_mahasiswa.kampus_prodi = akademik_prodi.id_prodi')
						->join('akademik_kelas','tbl_mahasiswa.id_kelas = akademik_kelas.id_kelas')
						->where('tbl_mahasiswa.status_mahasiswa', 2)
						->get('tbl_mahasiswa');
				}
        	return $query;
		}
		function getSatuMahasiswa($data){
			$this->db->where('nim', $data);
			$query = $this->db->get('tbl_mahasiswa');
			return $query;
		}
		function update_MHS($data){
			$new_member_insert_data = array(
				// 'nim' => $data['nim'],
				'nama' => $data['nama'],
				// 'angkatan_id' => $data['angkatan'],
				'alamat' => $data['alamat'],
				'gender' => $data['optionsRadios'],
				'agama_id' => $data['agama'],
				'tempat_lahir' => $data['tmpt_lahir'],
				'tanggal_lahir' => $data['tgl_lahir'],
				'nama_ibu' => $data['nama_ibu'],
				'nama_ayah' => $data['nama_ayah'],
				'no_hp_ortu' => $data['no_telp'],
				'pekerjaan_id_ibu' => $data['ID_p_ibu'],
				'pekerjaan_id_ayah' => $data['ID_p_bpk'],
				'alamat_ayah' => $data['alamat_ayah'],
				'alamat_ibu' => $data['alamat_ibu'],
				'penghasilan_ayah' => $data['hasil_ayah'],
				'penghasilan_ibu' => $data['hasil_ibu'],
				'sekolah_nama' => $data['nama_sekolah'],
				'sekolah_telpon' => $data['notelp_sekolah'],
				'sekolah_alamat' => $data['alamat_sekolah'],
				'sekolah_jurusan' => $data['jurusan'],
				'sekolah_tahun_lulus' => $data['tahunlulus'],
				'kampus_prodi' => $data['programstudi'],
				'id_kelas' => $data['id_kelas'],
				'semester_aktif' => $data['semester_aktif'],
				'status_mahasiswa' => $data['status_mhs']
			);
			$this->db->where('nim', $data['nim']);
			$insert = $this->db->update('tbl_mahasiswa', $new_member_insert_data);
			$new_member_insert_data = array(
				'id_kelas' => $data['id_kelas'],
			);
			$this->db->where('id_mhs', $data['nim']);
			$insert = $this->db->update('app_kelas_mhs', $new_member_insert_data);
			return $insert;
		}

		//CRUD DOSEN
		function input_Dosen($data){
			$this->db->where('nidn',$data['nidn']);
	        $result = $this->db->get('tbl_dosen');

	        if($result->num_rows() == 1){
	        	return 1;
	        } else{
				$new_member_insert_data = array(
					'nama_lengkap' => $data['nama_lengkap'],
					'nidn' => $data['nidn'],
					'nip' => $data['nip'],
					'no_ktp' => $data['no_ktp'],
					'tempat_lahir' => $data['tempat_lahir'],
					'tanggal_lahir' => $data['tanggal_lahir'],
					'gender' => $data['optionsRadios'],
					'agama_id' => $data['agama_id'],
					'status_kawin' => $data['status_kawin'],
					'gelar_pendidikan' => $data['gelar_pendidikan'],
					'alamat' => $data['alamat'],
					'hp' => $data['hp'],
					'email' => $data['email'],
					'prodi_id' => $data['prodi_id'],
					'status_pekerjaan' => $data['status_pekerjaan'],
					'foto_profil' => 0
				);
				$insert = $this->db->insert('tbl_dosen', $new_member_insert_data);
				return 0;
	        }
		}
		function generate_DSNuser($data){
			$new_account = array(
				'kode_user'  => $data['nidn'],
				'display_name' => $data['nama_lengkap'],
				'username' => $data['nidn'],
				'password' => md5($data['nidn']),
				'level' => 2
			);
			$insertUser = $this->db->insert('tbl_users', $new_account);
			return $insertUser;
		}
		function getDosen(){
				$result = $this->db
					->select('tbl_dosen.*,akademik_prodi.*')
					->join('akademik_prodi','tbl_dosen.prodi_id = akademik_prodi.id_prodi')
					->get('tbl_dosen');
			return $result;
		}
		function getDosenByOrder($id){
			if ($id == 1) {
				$result = $this->db
					->select('tbl_dosen.*,akademik_prodi.*')
					->join('akademik_prodi','tbl_dosen.prodi_id = akademik_prodi.id_prodi')
					->get('tbl_dosen');
			}else if ($id == 2) {
				$result = $this->db
					->select('tbl_dosen.*,akademik_prodi.*')
					->join('akademik_prodi','tbl_dosen.prodi_id = akademik_prodi.id_prodi')
					->where('status_pekerjaan',1)
					->get('tbl_dosen');
			}else if ($id == 3) {
				$result = $this->db
					->select('tbl_dosen.*,akademik_prodi.*')
					->join('akademik_prodi','tbl_dosen.prodi_id = akademik_prodi.id_prodi')
					->where('status_pekerjaan',2)
					->get('tbl_dosen');
			}
			return $result;
		}
		function getSatuDosen($data){
			$this->db->where('nidn', $data);
			$query = $this->db->get('tbl_dosen');
			return $query;
		}
		function update_Dosen($data){
			$new_member_insert_data = array(
				'nama_lengkap' => $data['nama_lengkap'],
				// 'nidn' => $data['nidn'],
				'nip' => $data['nip'],
				'no_ktp' => $data['no_ktp'],
				'tempat_lahir' => $data['tempat_lahir'],
				'tanggal_lahir' => $data['tanggal_lahir'],
				'gender' => $data['optionsRadios'],
				'agama_id' => $data['agama_id'],
				'status_kawin' => $data['status_kawin'],
				'gelar_pendidikan' => $data['gelar_pendidikan'],
				'alamat' => $data['alamat'],
				'hp' => $data['hp'],
				'email' => $data['email'],
				'prodi_id' => $data['prodi_id'],
				'status_pekerjaan' => $data['status_pekerjaan']
			);
			$this->db->where('nidn', $data['nidn']);
			$insert = $this->db->update('tbl_dosen', $new_member_insert_data);
			return $insert;
		}
		public function del_dosen($nidn){
			$akademik_jadwal_master = $this->db
			->where('nidn', $nidn)
			->get('akademik_jadwal_master');
			if($akademik_jadwal_master->num_rows() > 0){
				foreach($akademik_jadwal_master->result() as $jadwal_master){
					$delete_jadwal_master = $this->del_jadwal_master($jadwal_master->id_jadwal_master);
					if($delete_jadwal_master == FALSE){
						return FALSE;
					}
				}

				$delete_dosen = $this->db
				->where('nidn', $nidn)
				->delete('tbl_dosen');
				if($delete_dosen){
					return TRUE;
				} else{
					return FALSE;
				}
			} else{
				$delete_dosen = $this->db
				->where('nidn', $nidn)
				->delete('tbl_dosen');
				if($delete_dosen){
					return TRUE;
				} else{
					return FALSE;
				}
			}
		}

		//CRUD GEDUNG
		function input_Gedung($data){
			$this->db->where('nama_gedung',$data['nama_gedung']);
	        $result = $this->db->get('app_gedung');

	        if($result->num_rows()==1){
	            return 1;
	        }else{
	            $new_member_insert_data = array(
					'nama_gedung' => $data['nama_gedung']
				);
				$insert = $this->db->insert('app_gedung', $new_member_insert_data);
				return 0;
	        }
		}
		function getGedung(){
			$query = $this->db->get('app_gedung');
			return $query;
		}
		function getSatuGedung($data){
			$this->db->where('gedung_id', $data);
			$query = $this->db->get('app_gedung');
			return $query;
		}
		function update_Gedung($data){
			$this->db->where('nama_gedung',$data['nama_gedung']);
	        $result = $this->db->get('app_gedung');

	        if($result->num_rows() > 0){
	        	return FALSE;
	        }else{
	            $new_member_insert_data = array(
					'nama_gedung' => $data['nama_gedung']
				);
				$this->db->where('gedung_id', $data['gedung_id']);
				$insert = $this->db->update('app_gedung', $new_member_insert_data);
				return TRUE;
	        }
		}
		public function del_gedung($gedung_id){
			$app_ruangan = $this->db
			->where('gedung_id', $gedung_id)
			->get('app_ruangan');
			if($app_ruangan->num_rows() > 0){
				foreach($app_ruangan->result() as $ruangan){
					$delete_ruangan = $this->del_ruangan($ruangan->ruangan_id);
					if($delete_ruangan == FALSE){
						return FALSE;
					}
				}
			}

			$akademik_jadwal_matkul = $this->db
			->where('gedung_id', $gedung_id)
			->get('akademik_jadwal_matkul');
			if($akademik_jadwal_matkul->num_rows() > 0){
				foreach($akademik_jadwal_matkul->result() as $jadwal_matkul){
					$delete_jadwal_matkul = $this->del_jadwal_matkul($jadwal_matkul->id_jadwal_matkul);
					if($delete_jadwal_matkul == FALSE){
						return FALSE;
					}
				}
			}

			$akademik_jadwal_ujian = $this->db
			->where('gedung_id', $gedung_id)
			->get('akademik_jadwal_ujian');
			if($akademik_jadwal_ujian->num_rows() > 0){
				foreach($akademik_jadwal_ujian->result() as $jadwal_ujian){
					$delete_jadwal_ujian = $this->del_jadwal_ujian($jadwal_ujian->id_jadwal_ujian);
					if($delete_jadwal_ujian == FALSE){
						return FALSE;
					}
				}
			}

			$delete_gedung = $this->db
			->where('gedung_id', $gedung_id)
			->delete('app_gedung');
			if($delete_gedung){
				return TRUE;
			} else{
				return FALSE;
			}
		}

		//CRUD RUANGAN
		function input_Ruangan($data){
			$this->db->where('nama_ruangan', $data['nama_ruangan']);
	        $this->db->where('gedung_id', $data['gedung_id']);
	        $result = $this->db->get('app_ruangan');

	        if($result->num_rows()==1){
	            return 1;
	        } else{
	        	$new_member_insert_data = array(
		            'nama_ruangan' => $data['nama_ruangan'],
					'gedung_id' => $data['gedung_id'],
		            'kapasitas' => $data['kapasitas'],
		            'keterangan' => $data['keterangan']
				);
				$insert = $this->db->insert('app_ruangan', $new_member_insert_data);
				return 0;
	        }
		}
		function getRuangan(){
			$result = $this->db
			->select('app_ruangan.*,app_gedung.*')
			->join('app_gedung','app_ruangan.gedung_id = app_gedung.gedung_id')
			->get('app_ruangan');

			return $result;
		}
		function getSatuRuangan($data){
			$this->db->where('ruangan_id', $data);
			$query = $this->db->get('app_ruangan');
			return $query;
		}
		function getNameSatuRuangan($data){
			$this->db->where('ruangan_id', $data);
			$query = $this->db->get('app_ruangan');
			return $query->row()->nama_ruangan;
		}
		function update_Ruangan($data){
	        $this->db->where('nama_ruangan', $data['nama_ruangan']);
	        $this->db->where('gedung_id', $data['gedung_id']);
	        $result = $this->db->get('app_ruangan');

	        if($result->num_rows()==1){
	        	if($result->row()->kapasitas != $data['kapasitas'] || $result->row()->keterangan != $data['keterangan']){
		        	$new_member_insert_data = array(
			            'kapasitas' => $data['kapasitas'],
			            'keterangan' => $data['keterangan']
					);
					$this->db->where('ruangan_id', $data['ruangan_id']);
					$insert = $this->db->update('app_ruangan', $new_member_insert_data);
					return TRUE;
	        	}
	        	else{
	           		return FALSE;
	        	}
	        } else{
	        	$new_member_insert_data = array(
		            'nama_ruangan' => $data['nama_ruangan'],
					'gedung_id' => $data['gedung_id'],
		            'kapasitas' => $data['kapasitas'],
		            'keterangan' => $data['keterangan']
				);
				$this->db->where('ruangan_id', $data['ruangan_id']);
				$insert = $this->db->update('app_ruangan', $new_member_insert_data);
				return TRUE;
	        }
		}
		public function del_ruangan($ruangan_id){
			$akademik_jadwal_matkul = $this->db
			->where('ruangan_id', $ruangan_id)
			->get('akademik_jadwal_matkul');
			if($akademik_jadwal_matkul->num_rows() > 0){
				foreach($akademik_jadwal_matkul->result() as $jadwal_matkul){
					$delete_jadwal_matkul = $this->del_jadwal_matkul($jadwal_matkul->id_jadwal_matkul);
					if($delete_jadwal_matkul == FALSE){
						return FALSE;
					}
				}
			}

			$akademik_jadwal_ujian = $this->db
			->where('ruangan_id', $ruangan_id)
			->get('akademik_jadwal_ujian');
			if($akademik_jadwal_ujian->num_rows() > 0){
				foreach($akademik_jadwal_ujian->result() as $jadwal_ujian){
					$delete_jadwal_ujian = $this->del_jadwal_ujian($jadwal_ujian->id_jadwal_ujian);
					if($delete_jadwal_ujian == FALSE){
						return FALSE;
					}
				}
			}

			$delete_ruangan = $this->db
			->where('ruangan_id', $ruangan_id)
			->delete('app_ruangan');
			if($delete_ruangan){
				return TRUE;
			} else{
				return FALSE;
			}
		}

		//CRUD PROGRAM STUDI
		function input_Prodi($data){
			$this->db->where('nama_prodi',$data['nama_prodi']);
	        $result = $this->db->get('akademik_prodi');

	        if($result->num_rows()==1){
	            return 1;
	        }else{
	            $new_member_insert_data = array(
					'nama_prodi' => $data['nama_prodi'],
					'kode_prodi' =>$data['kode_prodi']
				);
				$insert = $this->db->insert('akademik_prodi', $new_member_insert_data);
				return 0;
	        }
		}
		function getProdi(){
			$query = $this->db->get('akademik_prodi');
			return $query->result_array();
		}

		function getSatuProdi($data){
			$this->db->where('id_prodi', $data);
			$query = $this->db->get('akademik_prodi');
			return $query;
		}
		function update_Prodi($data){
			$this->db->where('nama_prodi',$data['nama_prodi']);
	        $result = $this->db->get('akademik_prodi');

	        if($result->num_rows()==1){
	            return false;
	        }else{
	            $new_member_insert_data = array(
					'nama_prodi' => $data['nama_prodi']
				);
				$this->db->where('id_prodi', $data['id_prodi']);
				$insert = $this->db->update('akademik_prodi', $new_member_insert_data);
				return $insert;
	        }
		}

		//CRUD ANGKATAN
		function input_Angkatan($data){
			$this->db->where('tahun',$data['tahun']);
	        $result = $this->db->get('akademik_angkatan');

	        if($result->num_rows()==1){
	            return 1;
	        }else{
	            $new_member_insert_data = array(
					'tahun' => $data['tahun']
				);
				$insert = $this->db->insert('akademik_angkatan', $new_member_insert_data);
				return 0;
	        }
		}
		function getAngkatan(){
			$query = $this->db->get('akademik_angkatan');
			return $query;
		}
		function getSatuAngkatan($data){
			$this->db->where('id_angkatan', $data);
			$query = $this->db->get('akademik_angkatan');
			return $query;
		}
		function update_Angkatan($data){
			$this->db->where('tahun',$data['tahun']);
	        $result = $this->db->get('akademik_angkatan');

	        if($result->num_rows()==1){
	            return false;
	        }else{
	            $new_member_insert_data = array(
					'tahun' => $data['tahun']
				);
				$this->db->where('id_angkatan', $data['id_angkatan']);
				$insert = $this->db->update('akademik_angkatan', $new_member_insert_data);
				return $insert;
	        }
		}
		public function del_angkatan($id){
		  $this->db->where('id_angkatan', $id);
		  $query = $this->db->delete('akademik_angkatan');
		  return $query;
		}

		//CRUD MATA KULIAH
		function input_mk($data){
			$this->db->where('kode_mk',$data['kode_mk']);
	        $result_1 = $this->db->get('akademik_matkul');

	        if($result_1->num_rows()==1){
	            return 1;
	        }else{


	        		$new_member_insert_data = array(
	            		'kode_mk' => $data['kode_mk'],
									'nama_mk' => $data['nama_mk'],
									'id_prodi' => $data['id_prodi'],
									'sks_mk' => $data['sks_mk'],
									'semester' => $data['semester'],
									'tingkat' => $data['tingkat']
					);
					$insert = $this->db->insert('akademik_matkul', $new_member_insert_data);
					return 0;
	        	}
	        }

		function getMK(){
			$result = $this->db
			->select('akademik_matkul.*,akademik_prodi.*')
			->join('akademik_prodi','akademik_matkul.id_prodi = akademik_prodi.id_prodi')
			->get('akademik_matkul');

			return $result;
		}
		function getSatuMatkul($data){
			$this->db->where('kode_mk', $data);
			$query = $this->db->get('akademik_matkul');
			return $query;
		}
		function update_Matkul($data){
	        $this->db->where('nama_mk', $data['nama_mk']);
	        $result = $this->db->get('akademik_matkul');

	        if($result->num_rows() == 1){
	        	if($result->row()->sks_mk != $data['sks_mk'] ||
	        		$result->row()->semester != $data['semester'] ||
	        		$result->row()->tingkat != $data['tingkat']){
		        	$new_member_insert_data = array(
						'sks_mk' => $data['sks_mk'],
						'semester' => $data['semester'],
						'tingkat' => $data['tingkat']
					);
					$this->db->where('kode_mk', $data['kode_mk']);
					$insert = $this->db->update('akademik_matkul', $new_member_insert_data);
					return $insert;
	        	} else{
	        		return false;
	        	}
	        } else{
	        	$new_member_insert_data = array(
					'nama_mk' => $data['nama_mk'],
					'sks_mk' => $data['sks_mk'],
					'semester' => $data['semester'],
					'tingkat' => $data['tingkat']
				);
				$this->db->where('kode_mk', $data['kode_mk']);
				$insert = $this->db->update('akademik_matkul', $new_member_insert_data);
				return $insert;
	        }
		}
		public function del_mk($kode_mk){
			$akademik_jadwal_master = $this->db
			->where('kode_mk', $kode_mk)
			->get('akademik_jadwal_master');
			if($akademik_jadwal_master->num_rows() > 0){
				foreach($akademik_jadwal_master->result() as $jadwal_master){
					$delete_jadwal_master = $this->del_jadwal_master($jadwal_master->id_jadwal_master);
					if($delete_jadwal_master == FALSE){
						return FALSE;
					}
				}
				$delete_mk = $this->db
				->where('kode_mk', $kode_mk)
				->delete('akademik_matkul');
				if($delete_mk){
					return TRUE;
				} else{
					return FALSE;
				}
			} else{
				$delete_mk = $this->db
				->where('kode_mk', $kode_mk)
				->delete('akademik_matkul');
				if($delete_mk){
					return TRUE;
				} else{
					return FALSE;
				}
			}
		}

		//CRUD KELAS
		function input_Kelas($data){
			$this->db->where('nama_kelas',$data['nama_kelas']);
	        $result = $this->db->get('akademik_kelas');

	        $kab = $this->db->get_where('akademik_prodi',array('id_prodi'=>$data['id_prodi']));
	        //$kabre = array_shift($kab->result_array());

	        if($result->num_rows()==1){
	            return false;
	        }else{
	            $new_member_insert_data = array(
					'nama_kelas' => ($kab->row()->kode_prodi.'-'.substr($data['Angkatan'], -2).'-'.$data['nama_kelas']),
					'id_prodi' => $data['id_prodi'],
					'kuota' => $data['jumlah_mhs'],
				);
				$insert = $this->db->insert('akademik_kelas', $new_member_insert_data);
				return $insert;
	        }
		}
		function getKelas(){
			$result = $this->db
			->select('akademik_kelas.*,akademik_prodi.*')
			->join('akademik_prodi','akademik_kelas.id_prodi = akademik_prodi.id_prodi')
			->get('akademik_kelas');

			return $result;
		}
		function kelas($id_prodi){
			$kelas ="<option value='0'>-- Pilih Kelas --</option>";
			$kab = $this->db->get_where('akademik_kelas',array('id_prodi'=>$id_prodi));

			foreach ($kab->result_array() as $data ){
				$kelas.= "<option value='$data[id_kelas]'>$data[nama_kelas]</option>";
			}

			return $kelas;
		}
		function matkul($id_prodi){
			$kelas ="<option value='0'>-- Pilih Matkul --</option>";
			$kab = $this->db->get_where('akademik_matkul',array('id_prodi'=>$id_prodi));

			foreach ($kab->result_array() as $data ){
				$kelas.= "<option value='$data[kode_mk]'>$data[nama_mk]</option>";
			}

			return $kelas;
		}
		function dosen($id_prodi){
			$kelas ="<option value='0'>-- Pilih Dosen --</option>";
			$kab = $this->db->get_where('tbl_dosen',array('prodi_id'=>$id_prodi));

			foreach ($kab->result_array() as $data ){
				$kelas.= "<option value='$data[nidn]'>$data[nama_lengkap]</option>";
			}

			return $kelas;
		}
		function gedung($id_gedung){
			$kelas ="<option value='0'>-- Pilih Ruangan --</option>";
			$kab = $this->db->get_where('app_ruangan',array('gedung_id'=>$id_gedung));

			foreach ($kab->result_array() as $data ){
				$kelas.= "<option value='$data[ruangan_id]'>$data[nama_ruangan]</option>";
			}

			return $kelas;
		}
		// function getSatuProdi($data){
		// 	$this->db->where('id_kelas', $data);
		// 	$query = $this->db->get('akademik_kelas');
		// 	return $query;
		// }
		// function update_Prodi($data){
		// 	$this->db->where('nama_kelas',$data['nama_kelas']);
	 //        $result = $this->db->get('akademik_kelas');

	 //        if($result->num_rows()==1){
	 //            return false;
	 //        }else{
	 //            $new_member_insert_data = array(
		// 			'nama_prodi' => $data['nama_prodi']
		// 		);
		// 		$this->db->where('id_prodi', $data['id_prodi']);
		// 		$insert = $this->db->update('akademik_prodi', $new_member_insert_data);
		// 		return $insert;
	 //        }
		// }
		// public function del_prodi($id){
		// 	$this->db->where('id_prodi', $id);
		// 	$query = $this->db->delete('akademik_prodi');
		// 	return $query;
		// }

		//CRUD Jadwal Master
		function input_Jadwal_master($data){
			$this->db->where('id_tahun_akademik',$data['id_tahun_akademik']);
			$this->db->where('id_prodi',$data['id_prodi']);
			$this->db->where('kode_mk',$data['kode_mk']);
			$this->db->where('id_kelas',$data['id_kelas']);
			$this->db->where('nidn',$data['nidn']);
	        $result = $this->db->get('akademik_jadwal_master');

	        if($result->num_rows() >= 1){
	        	return 1;
	        } else{
		    	$new_member_insert_data = array(
					'id_tahun_akademik' => $data['id_tahun_akademik'],
					'id_prodi' => $data['id_prodi'],
					'kode_mk' => $data['kode_mk'],
					'id_kelas' => $data['id_kelas'],
					'nidn' => $data['nidn']
				);
				$insert = $this->db->insert('akademik_jadwal_master', $new_member_insert_data);
				if($insert){
					return 0;
				} else{
					return 1;
				}
			}
	    }
		function getJadwal_master(){
			$result = $this->db
			->select('akademik_jadwal_master.*,akademik_tahun_akademik.*,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
				tbl_dosen.*')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('tbl_dosen','akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->get('akademik_jadwal_master');
			return $result;
		}
		function getJadwalDsn_master(){
			$ta = $this->getOpenTahunAkademik();
			$result = $this->db
			->select('akademik_jadwal_master.*,akademik_tahun_akademik.*,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
				tbl_dosen.*')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('tbl_dosen','akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->where('akademik_jadwal_master.nidn',$this->session->kode_user)
			->where('akademik_jadwal_master.id_tahun_akademik',$ta)
			->get('akademik_jadwal_master');

			return $result;
		}
		function getJadwalMhs_master(){
			$ta = $this->getOpenTahunAkademik();
			$result = $this->db
			->select('akademik_jadwal_master.*,akademik_tahun_akademik.*,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
				akademik_krs.*')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('akademik_krs','akademik_jadwal_master.id_jadwal_master = akademik_krs.id_jadwal_master')
			->where('akademik_krs.nim',$this->session->kode_user)
			->where('akademik_jadwal_master.id_tahun_akademik',$ta)
			->get('akademik_jadwal_master');
			return $result;
		}
		function getJadwalMhs_ksm($nim){
		  $result = $this->db
		  ->select('akademik_jadwal_master.*,akademik_tahun_akademik.*,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
		    akademik_krs.*')
		  ->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
		  ->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
		  ->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
		  ->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
		  ->join('akademik_krs','akademik_jadwal_master.id_jadwal_master = akademik_krs.id_jadwal_master')
		  ->where('akademik_krs.nim',$nim)
		  ->get('akademik_jadwal_master');
		  return $result;
		}
		function getKhs_Mhs($nim){
			$result = $this->db
			->select('akademik_nilai.*,akademik_jadwal_master.*,akademik_matkul.*')
			->join('akademik_jadwal_master','akademik_nilai.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->where('akademik_nilai.nim', $nim)
			->where('akademik_nilai.nilai !=','E')

			->get('akademik_nilai');
			return $result;
		}
		function getKhs_Mhs_ngulang($nim){
			$result = $this->db
			->select('akademik_nilai.*,akademik_jadwal_master.*,akademik_matkul.*')
			->join('akademik_jadwal_master','akademik_nilai.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->where('akademik_nilai.nim', $nim)
			->where('akademik_nilai.nilai','E')
			->get('akademik_nilai');
			return $result;
		}
		function update_jadwal_master($data){
			$is_Filled = $this->db
			->where('id_tahun_akademik', $data['id_tahun_akademik'])
			->where('kode_mk', $data['kode_mk'])
			->where('id_prodi', $data['id_prodi'])
			->where('id_kelas', $data['id_kelas'])
			->where('nidn', $data['nidn'])
			->get('akademik_jadwal_master');

			if($is_Filled->num_rows() > 0){
				return FALSE;
			} else{
				$new_member_insert_data = array(
					'kode_mk' => $data['kode_mk'],
					'id_prodi' => $data['id_prodi'],
					'id_kelas' => $data['id_kelas'],
					'nidn' => $data['nidn']
				);
				$this->db->where('id_jadwal_master', $data['id_jadwal_master']);
				$insert = $this->db->update('akademik_jadwal_master', $new_member_insert_data);
				return TRUE;
			}
		}
		public function del_jadwal_master($id_jadwal_master){

			// akademik_jadwal_matkul
			$akademik_jadwal_matkul = $this->db
			->where('id_jadwal_master', $id_jadwal_master)
			->get('akademik_jadwal_matkul');
			if($akademik_jadwal_matkul->num_rows() > 0){
				foreach($akademik_jadwal_matkul->result() as $jadwal_matkul){
					$delete_jadwal_matkul = $this->del_jadwal_matkul($jadwal_matkul->id_jadwal_matkul);
					if($delete_jadwal_matkul == FALSE){
						return FALSE;
					}
				}
			}

			// akademik_jadwal_ujian
			$akademik_jadwal_ujian = $this->db
			->where('id_jadwal_master', $id_jadwal_master)
			->get('akademik_jadwal_ujian');
			if($akademik_jadwal_ujian->num_rows() > 0){
				foreach($akademik_jadwal_ujian->result() as $jadwal_ujian){
					$delete_jadwal_ujian = $this->del_jadwal_ujian($jadwal_ujian->id_jadwal_ujian);
					if($delete_jadwal_ujian == FALSE){
						return FALSE;
					}
				}
			}

			// akademik_krs
			$akademik_krs = $this->db
			->where('id_jadwal_master', $id_jadwal_master)
			->get('akademik_krs');
			if($akademik_krs->num_rows() > 0){
				$delete_akademik_krs = $this->db
				->where('id_jadwal_master', $id_jadwal_master)
				->delete('akademik_krs');
				if($delete_akademik_krs){
					// do nothing
				} else{
					return FALSE;
				}
			}

			// akademik_nilai
			$akademik_nilai = $this->db
			->where('id_jadwal_master', $id_jadwal_master)
			->get('akademik_nilai');
			if($akademik_nilai->num_rows() > 0){
				$delete_nilai = $this->db
				->where('id_jadwal_master', $id_jadwal_master)
				->delete('akademik_nilai');
				if($delete_nilai){
					// do nothing
				} else{
					return FALSE;
				}
			}

			// temp_krs
			$temp_krs = $this->db
			->where('id_jadwal_master', $id_jadwal_master)
			->get('temp_krs');
			if($temp_krs->num_rows() > 0){
				$delete_temp_krs = $this->db
				->where('id_jadwal_master', $id_jadwal_master)
				->delete('temp_krs');
				if($delete_temp_krs){
					// do nothing
				} else{
					return FALSE;
				}
			}

			//delete kuisioner hasil tipe satu
			$kuisioner_mhs_hasil_tipe_satu = $this->db
			->where('id_jadwal_master', $id_jadwal_master)
			->get('kuisioner_mhs_hasil_tipe_satu');
			if($kuisioner_mhs_hasil_tipe_satu->num_rows() > 0){
				$delete_kuisioner_tipe_satu = $this->db
				->where('id_jadwal_master', $id_jadwal_master)
				->delete('kuisioner_mhs_hasil_tipe_satu');
				if($delete_kuisioner_tipe_satu){
					// do nothing
				} else{
					return FALSE;
				}
			}

			//delete jadwal master
			$delete_jadwal_master = $this->db
			->where('id_jadwal_master', $id_jadwal_master)
			->delete('akademik_jadwal_master');
			if($delete_jadwal_master){
				return TRUE;
			} else{
				return FALSE;
			}
		}

		//CRUD Jadwal Matkul
		function isBentrok_mk($data, $jadwal_master){
			//$array = array('id_hari' => $data['id_hari'], 'ruangan_id' => $data['ruangan_id'], 'nidn' => $data['nidn'], 'id_kelas' => $data['id_kelas'], 'id_tahun_akademik' => $data['id_tahun_akademik']);
			$array = array('id_hari' => $data['id_hari'], 'ruangan_id' => $data['ruangan_id'], 'id_tahun_akademik' => $jadwal_master->row()->id_tahun_akademik);
			$query = $this->db
			->select('akademik_jadwal_master.*,akademik_jadwal_matkul.*')
			->join('akademik_jadwal_master', 'akademik_jadwal_matkul.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->get_where('akademik_jadwal_matkul', $array);
			$hasil = 0;

			foreach($query->result() as $d):
				$time_mulai    = explode('.', $d->jam_mulai);
				$mulai = ($time_mulai[0] * 60.0 + $time_mulai[1] * 1.0);

				$time_selesai    = explode('.', $d->jam_selesai);
				$selesai = ($time_selesai[0] * 60.0 + $time_selesai[1] * 1.0);

				if ((($data['jam_mulai'] >= $mulai) && ($data['jam_mulai'] <= $selesai)) || (($data['jam_selesai'] >= $mulai) && ($data['jam_mulai'] <= $selesai))){
					$hasil = 1;
				}
			endforeach;

			$array = array('id_hari' => $data['id_hari'], 'id_kelas' => $jadwal_master->row()->id_kelas, 'id_tahun_akademik' => $jadwal_master->row()->id_tahun_akademik);
			$query = $this->db
			->select('akademik_jadwal_master.*,akademik_jadwal_matkul.*')
			->join('akademik_jadwal_master', 'akademik_jadwal_matkul.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->get_where('akademik_jadwal_matkul', $array);

			foreach($query->result() as $d):
				$time_mulai    = explode('.', $d->jam_mulai);
				$mulai = ($time_mulai[0] * 60.0 + $time_mulai[1] * 1.0);

				$time_selesai    = explode('.', $d->jam_selesai);
				$selesai = ($time_selesai[0] * 60.0 + $time_selesai[1] * 1.0);

				if ((($data['jam_mulai'] >= $mulai) && ($data['jam_mulai'] <= $selesai)) || (($data['jam_selesai'] >= $mulai) && ($data['jam_mulai'] <= $selesai))){
					$hasil = 1;
				}
			endforeach;

			$array = array('id_hari' => $data['id_hari'], 'nidn' => $jadwal_master->row()->nidn, 'id_tahun_akademik' => $jadwal_master->row()->id_tahun_akademik);
			$query = $this->db
			->select('akademik_jadwal_master.*,akademik_jadwal_matkul.*')
			->join('akademik_jadwal_master', 'akademik_jadwal_matkul.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->get_where('akademik_jadwal_matkul', $array);

			foreach($query->result() as $d):
				$time_mulai    = explode('.', $d->jam_mulai);
				$mulai = ($time_mulai[0] * 60.0 + $time_mulai[1] * 1.0);

				$time_selesai    = explode('.', $d->jam_selesai);
				$selesai = ($time_selesai[0] * 60.0 + $time_selesai[1] * 1.0);

				if ((($data['jam_mulai'] >= $mulai) && ($data['jam_mulai'] <= $selesai)) || (($data['jam_selesai'] >= $mulai) && ($data['jam_mulai'] <= $selesai))){
					$hasil = 1;
				}
			endforeach;

			if ($hasil == 1) {
				return true;
			}else{
				return false;
			}
		}
		function input_Jadwal_mk($data, $jadwal_master){
			$a = $data['jam_mulai'];
			$b = $data['jam_selesai'];

			$time_mulai    = explode('.', $data['jam_mulai']);
			$data['jam_mulai'] = ($time_mulai[0] * 60.0 + $time_mulai[1] * 1.0);

			$time_selesai    = explode('.', $data['jam_selesai']);
			$data['jam_selesai'] = ($time_selesai[0] * 60.0 + $time_selesai[1] * 1.0);

			if ($this->isBentrok_mk($data, $jadwal_master)) {
				return false;
			}else{
					$new_member_insert_data = array(
						'id_hari' => $data['id_hari'],
						'id_jadwal_master' => $data['id_jadwal_master'],
						'gedung_id' => $data['gedung_id'],
						'jam_mulai' => $a,
						'jam_selesai' => $b,
						'ruangan_id' => $data['ruangan_id']
					);

					$insert = $this->db->insert('akademik_jadwal_matkul', $new_member_insert_data);
					if ($insert) {
						return true;
					}else{
						return false;
					}
			}
		}
		function get_satu_jadwal_master($id_jadwal_master){
			$result = $this->db
			->select('akademik_jadwal_master.*,akademik_tahun_akademik.*,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
				tbl_dosen.*')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('tbl_dosen','akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->where('akademik_jadwal_master.id_jadwal_master', $id_jadwal_master)
			->get('akademik_jadwal_master');

			return $result;
		}
		function get_satu_jadwal_mk($id_jadwal_master){
			$result = $this->db
			->select('akademik_jadwal_matkul.*,akademik_jadwal_master.*,app_hari.*,app_gedung.*,app_ruangan.nama_ruangan')
			->join('akademik_jadwal_master','akademik_jadwal_matkul.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('app_hari','akademik_jadwal_matkul.id_hari = app_hari.id_hari')
			->join('app_gedung','akademik_jadwal_matkul.gedung_id = app_gedung.gedung_id')
			->join('app_ruangan','akademik_jadwal_matkul.ruangan_id = app_ruangan.ruangan_id')
			->where('akademik_jadwal_matkul.id_jadwal_master', $id_jadwal_master)
			->get('akademik_jadwal_matkul');

			return $result;
		}
		function getJadwal_mk(){
			$result = $this->db
			->select('akademik_jadwal_matkul.*,app_hari.*,app_gedung.*,app_ruangan.nama_ruangan,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
				tbl_dosen.*,akademik_tahun_akademik.*')
			->join('app_hari','akademik_jadwal_matkul.id_hari = app_hari.id_hari')
			->join('app_gedung','akademik_jadwal_matkul.gedung_id = app_gedung.gedung_id')
			->join('app_ruangan','akademik_jadwal_matkul.ruangan_id = app_ruangan.ruangan_id')
			->join('akademik_matkul','akademik_jadwal_matkul.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_matkul.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_matkul.id_kelas = akademik_kelas.id_kelas')
			->join('tbl_dosen','akademik_jadwal_matkul.nidn = tbl_dosen.nidn')
			->join('akademik_tahun_akademik','akademik_jadwal_matkul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->get('akademik_jadwal_matkul');

			return $result;
		}
		public function del_jadwal_matkul($id_jadwal_matkul){
		  $akademik_presensi = $this->db
		  ->where('id_jadwal_matkul', $id_jadwal_matkul)
		  ->get('akademik_presensi');
		  if($akademik_presensi->num_rows() > 0){
		  	foreach($akademik_presensi->result() as $presensi){
		  		$delete_presensi = $this->del_Presensi($presensi->id_presensi);
		  		if($delete_presensi == FALSE){
		  			return FALSE;
		  		}
		  	}
		  	$delete_jadwal_matkul = $this->db
		  	->where('id_jadwal_matkul', $id_jadwal_matkul)
		  	->delete('akademik_jadwal_matkul');
		  	if($delete_jadwal_matkul){
		  		return TRUE;
		  	} else{
		  		return FALSE;
		  	}
		} else{
		  	$delete_jadwal_matkul = $this->db
		  	->where('id_jadwal_matkul', $id_jadwal_matkul)
		  	->delete('akademik_jadwal_matkul');
		  	if($delete_jadwal_matkul){
		  		return TRUE;
		  	} else{
		  		return FALSE;
		  	}
		  }
		}

		//UJIAN
		function isBentrok_ujian($data){
			$array = array('id_hari' => $data['id_hari'], 'ruangan_id' => $data['ruangan_id'], 'id_tahun_akademik' => $data['id_tahun_akademik'], 'jenis_ujian' => $data['jenis_ujian']);
			$query = $this->db
			->select('akademik_jadwal_master.*,akademik_jadwal_ujian.*')
			->join('akademik_jadwal_master', 'akademik_jadwal_ujian.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->get_where('akademik_jadwal_ujian', $array);
			$hasil = 0;

			foreach($query->result() as $d):
				$time_mulai    = explode('.', $d->jam_mulai);
				$mulai = ($time_mulai[0] * 60.0 + $time_mulai[1] * 1.0);

				$time_selesai    = explode('.', $d->jam_selesai);
				$selesai = ($time_selesai[0] * 60.0 + $time_selesai[1] * 1.0);

				if ((($data['jam_mulai'] >= $mulai) && ($data['jam_mulai'] <= $selesai)) || (($data['jam_selesai'] >= $mulai) && ($data['jam_mulai'] <= $selesai))){
					$hasil = 1;
				}
			endforeach;

			$array = array('id_hari' => $data['id_hari'], 'id_kelas' => $data['id_kelas'], 'id_tahun_akademik' => $data['id_tahun_akademik'], 'jenis_ujian' => $data['jenis_ujian']);
			$query = $this->db
			->select('akademik_jadwal_master.*,akademik_jadwal_ujian.*')
			->join('akademik_jadwal_master', 'akademik_jadwal_ujian.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->get_where('akademik_jadwal_ujian', $array);

			foreach($query->result() as $d):
				$time_mulai    = explode('.', $d->jam_mulai);
				$mulai = ($time_mulai[0] * 60.0 + $time_mulai[1] * 1.0);

				$time_selesai    = explode('.', $d->jam_selesai);
				$selesai = ($time_selesai[0] * 60.0 + $time_selesai[1] * 1.0);

				if ((($data['jam_mulai'] >= $mulai) && ($data['jam_mulai'] <= $selesai)) || (($data['jam_selesai'] >= $mulai) && ($data['jam_mulai'] <= $selesai))){
					$hasil = 1;
				}
			endforeach;

			// $array = array('id_hari' => $data['id_hari'], 'jenis_ujian' => $data['jenis_ujian'], 'id_tahun_akademik' => $data['id_tahun_akademik']);
			// $query = $this->db->get_where('akademik_jadwal_ujian', $array);

			// foreach($query->result() as $d):
			// 	$time_mulai    = explode('.', $d->jam_mulai);
			// 	$mulai = ($time_mulai[0] * 60.0 + $time_mulai[1] * 1.0);

			// 	$time_selesai    = explode('.', $d->jam_selesai);
			// 	$selesai = ($time_selesai[0] * 60.0 + $time_selesai[1] * 1.0);

			// 	if ((($data['jam_mulai'] >= $mulai) && ($data['jam_mulai'] <= $selesai)) || (($data['jam_selesai'] >= $mulai) && ($data['jam_mulai'] <= $selesai))){
			// 		$hasil = 1;
			// 	}
			// endforeach;

			if ($hasil == 1) {
				return true;
			}else{
				return false;
			}
		}
		function input_Jadwal_ujian($data){
			$a = $data['jam_mulai'];
			$b = $data['jam_selesai'];

			$time_mulai    = explode('.', $data['jam_mulai']);
			$data['jam_mulai'] = ($time_mulai[0] * 60.0 + $time_mulai[1] * 1.0);

			$time_selesai    = explode('.', $data['jam_selesai']);
			$data['jam_selesai'] = ($time_selesai[0] * 60.0 + $time_selesai[1] * 1.0);

			if ($this->isBentrok_ujian($data)) {
				return false;
			}else{
				$jadwal_master = $this->db
				->where('id_tahun_akademik', $data['id_tahun_akademik'])
				->where('kode_mk', $data['kode_mk'])
				->where('id_prodi', $data['id_prodi'])
				->where('id_kelas', $data['id_kelas'])
				->get('akademik_jadwal_master');
				if($jadwal_master->num_rows() > 0){
					$new_member_insert_data = array(
						'id_jadwal_master' => $jadwal_master->row()->id_jadwal_master,
						'id_hari' => $data['id_hari'],
						'gedung_id' => $data['gedung_id'],
						'jam_mulai' => $a,
						'jam_selesai' => $b,
						'ruangan_id' => $data['ruangan_id'],
						'jenis_ujian' => $data['jenis_ujian']
					);

					$insert = $this->db->insert('akademik_jadwal_ujian', $new_member_insert_data);
					if ($insert) {
						return true;
					}else{
						return false;
					}
				} else{
					return false;
				}
			}
		}
		function getJadwal_ujian(){
			$result = $this->db
			->select('akademik_jadwal_ujian.*,akademik_jadwal_master.*,app_hari.*,app_gedung.*,app_ruangan.nama_ruangan,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,akademik_tahun_akademik.*')
			->join('akademik_jadwal_master','akademik_jadwal_ujian.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('app_hari','akademik_jadwal_ujian.id_hari = app_hari.id_hari')
			->join('app_gedung','akademik_jadwal_ujian.gedung_id = app_gedung.gedung_id')
			->join('app_ruangan','akademik_jadwal_ujian.ruangan_id = app_ruangan.ruangan_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->get('akademik_jadwal_ujian');

			return $result;
		}
		public function del_jadwal_ujian($id_jadwal_ujian){
		  	$query = $this->db
		  	->where('id_jadwal_ujian', $id_jadwal_ujian)
		  	->delete('akademik_jadwal_ujian');

		  	if($query){
		  		return TRUE;
		  	} else{
		  		return FALSE;
		  	}
		}

		function getShift(){
			$query = $this->db->get('app_shift');
			return $query;
		}

		//KUISIONER ADMIN
		function getJudul_kuisioner(){
			$result = $this->db
			->select('kuisioner_judul.*,akademik_tahun_akademik.*')
			->join('akademik_tahun_akademik','kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->get('kuisioner_judul');

			return $result;
		}
		function input_Judul_kuisioner($data){
			$this->db->where('id_tahun_akademik',$data['id_tahun_akademik']);
			$this->db->where('judul',$data['judul_kuisioner']);
	        $result = $this->db->get('kuisioner_judul');

	        if($result->num_rows() >= 1){
	        	return FALSE;
	        } else{
		    	$new_member_insert_data = array(
					'id_tahun_akademik' => $data['id_tahun_akademik'],
					'tipe' => $data['tipe'],
					'judul' => $data['judul_kuisioner']
				);
				$insert = $this->db->insert('kuisioner_judul', $new_member_insert_data);
				if($insert){
					$this->db->where('id_tahun_akademik',$data['id_tahun_akademik']);
					$this->db->where('judul',$data['judul_kuisioner']);
			        $result = $this->db->get('kuisioner_judul');

			        return $result->row()->id_kuisioner_judul;
				} else{
					return FALSE;
				}
			}
	    }
	    function update_kuisioner_judul($data){
			$this->db->where('id_tahun_akademik',$data['id_tahun_akademik']);
			$this->db->where('judul',$data['judul_kuisioner']);
	        $result = $this->db->get('kuisioner_judul');

	        if($result->num_rows() > 0){
	        	return FALSE;
	        }else{
		    	$new_member_insert_data = array(
					'id_tahun_akademik' => $data['id_tahun_akademik'],
					'tipe' => $data['tipe'],
					'judul' => $data['judul_kuisioner']
				);
				$this->db->where('id_kuisioner_judul', $data['id_kuisioner_judul']);
				$insert = $this->db->update('kuisioner_judul', $new_member_insert_data);
				return TRUE;
	        }
		}
	    function del_kuisioner_judul($id_kuisioner_judul){
	    	$kuisioner_pertanyaan = $this->db
	    	->where('id_kuisioner_judul', $id_kuisioner_judul)
	    	->get('kuisioner_pertanyaan');
	    	if($kuisioner_pertanyaan->num_rows() > 0){
	    		foreach($kuisioner_pertanyaan->result() as $pertanyaan){
	    			$delete_kuisioner_pertanyaan = $this->del_kuisioner_pertanyaan($pertanyaan->id_kuisioner_pertanyaan);
	    			if($delete_kuisioner_pertanyaan == FALSE){
	    				return FALSE;
	    			}
	    		}

	    		$delete_kuisioner_judul = $this->db
	    		->where('id_kuisioner_judul', $id_kuisioner_judul)
	    		->delete('kuisioner_judul');
	    		if($delete_kuisioner_judul){
	    			return TRUE;
	    		} else{
	    			return FALSE;
	    		}
	    	} else{
	    		$delete_kuisioner_judul = $this->db
	    		->where('id_kuisioner_judul', $id_kuisioner_judul)
	    		->delete('kuisioner_judul');
	    		if($delete_kuisioner_judul){
	    			return TRUE;
	    		} else{
	    			return FALSE;
	    		}
	    	}
	    }
	    function get_satu_judul_kuisioner($id_kuisioner_judul){
			$result = $this->db
			->select('kuisioner_judul.*,akademik_tahun_akademik.*')
			->join('akademik_tahun_akademik','kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('kuisioner_judul.id_kuisioner_judul', $id_kuisioner_judul)
			->get('kuisioner_judul');

			return $result;
		}
		function pertanyaan_isFilled($id_kuisioner_judul){
			$result = $this->db
			->where('id_kuisioner_judul', $id_kuisioner_judul)
			->get('kuisioner_pertanyaan');
			if($result->num_rows() > 0){
				return TRUE;
			} else{
				return FALSE;
			}
		}
		function hasil_kuisioner_isFilled($id_kuisioner_judul, $id_kuisioner_pertanyaan){
			$kuisioner_tipe_satu = $this->db
			->where('id_kuisioner_judul', $id_kuisioner_judul)
			->where('id_kuisioner_pertanyaan', $id_kuisioner_pertanyaan)
			->get('kuisioner_mhs_hasil_tipe_satu');
			if($kuisioner_tipe_satu->num_rows() > 0){
				return TRUE;
			} else{
				$kuisioner_tipe_dua = $this->db
				->where('id_kuisioner_judul', $id_kuisioner_judul)
				->where('id_kuisioner_pertanyaan', $id_kuisioner_pertanyaan)
				->get('kuisioner_mhs_hasil_tipe_dua');
				if($kuisioner_tipe_dua->num_rows() > 0){
					return TRUE;
				} else{
					return FALSE;
				}
			}
		}
		function get_pertanyaan_kuisioner($id_kuisioner_judul){
			$result = $this->db
			->select('kuisioner_pertanyaan.*,kuisioner_judul.*')
			->join('kuisioner_judul','kuisioner_pertanyaan.id_kuisioner_judul = kuisioner_judul.id_kuisioner_judul')
			->where('kuisioner_pertanyaan.id_kuisioner_judul', $id_kuisioner_judul)
			->get('kuisioner_pertanyaan');

			return $result;
		}
		function get_satu_kuisioner_pertanyaan($id_kuisioner_pertanyaan){
			$result = $this->db
			->select('kuisioner_pertanyaan.*,kuisioner_judul.*')
			->join('kuisioner_judul','kuisioner_pertanyaan.id_kuisioner_judul = kuisioner_judul.id_kuisioner_judul')
			->where('kuisioner_pertanyaan.id_kuisioner_pertanyaan', $id_kuisioner_pertanyaan)
			->get('kuisioner_pertanyaan');

			return $result;
		}
		function input_pertanyaan_kuisioner($data){
			$this->db->where('id_kuisioner_judul',$data['id_kuisioner_judul']);
			$this->db->where('pertanyaan',$data['pertanyaan_kuisioner']);
	        $result = $this->db->get('kuisioner_pertanyaan');

	        if($result->num_rows() >= 1){
	        	return 1;
	        } else{
		    	$new_member_insert_data = array(
					'id_kuisioner_judul' => $data['id_kuisioner_judul'],
					'pertanyaan' => $data['pertanyaan_kuisioner']
				);
				$insert = $this->db->insert('kuisioner_pertanyaan', $new_member_insert_data);
				if($insert){
					return 0;
				} else{
					return 1;
				}
			}
	    }
	    function judul_kuisioner_isFilled($id_kuisioner_judul){
			$kuisioner_tipe_satu = $this->db
			->where('id_kuisioner_judul', $id_kuisioner_judul)
			->get('kuisioner_mhs_hasil_tipe_satu');
			if($kuisioner_tipe_satu->num_rows() > 0){
				return TRUE;
			} else{
				$kuisioner_tipe_dua = $this->db
				->where('id_kuisioner_judul', $id_kuisioner_judul)
				->get('kuisioner_mhs_hasil_tipe_dua');
				if($kuisioner_tipe_dua->num_rows() > 0){
					return TRUE;
				} else{
					return FALSE;
				}
			}
		}
	    function update_kuisioner_pertanyaan($data){
			$this->db->where('id_kuisioner_judul',$data['id_kuisioner_judul']);
			$this->db->where('pertanyaan',$data['pertanyaan_kuisioner']);
	        $result = $this->db->get('kuisioner_pertanyaan');

	        if($result->num_rows() > 0){
	        	return FALSE;
	        }else{
		    	$new_member_insert_data = array(
					'id_kuisioner_judul' => $data['id_kuisioner_judul'],
					'pertanyaan' => $data['pertanyaan_kuisioner']
				);
				$this->db->where('id_kuisioner_pertanyaan', $data['id_kuisioner_pertanyaan']);
				$insert = $this->db->update('kuisioner_pertanyaan', $new_member_insert_data);
				return TRUE;
	        }
		}
	    function del_kuisioner_pertanyaan($id_kuisioner_pertanyaan){
	    	$kuisioner_mhs_hasil_tipe_satu = $this->db
	    	->where('id_kuisioner_pertanyaan', $id_kuisioner_pertanyaan)
	    	->get('kuisioner_mhs_hasil_tipe_satu');
	    	if($kuisioner_mhs_hasil_tipe_satu->num_rows() > 0){
	    		$delete_kuisioner_tipe_satu = $this->db
	    		->where('id_kuisioner_pertanyaan', $id_kuisioner_pertanyaan)
	    		->delete('kuisioner_mhs_hasil_tipe_satu');
	    		if($delete_kuisioner_tipe_satu){
	    			//do nothing
	    		} else{
	    			return FALSE;
	    		}
	    	}

	    	$kuisioner_mhs_hasil_tipe_dua = $this->db
	    	->where('id_kuisioner_pertanyaan', $id_kuisioner_pertanyaan)
	    	->get('kuisioner_mhs_hasil_tipe_dua');
	    	if($kuisioner_mhs_hasil_tipe_dua->num_rows() > 0){
	    		$delete_kuisioner_tipe_dua = $this->db
	    		->where('id_kuisioner_pertanyaan', $id_kuisioner_pertanyaan)
	    		->delete('kuisioner_mhs_hasil_tipe_dua');
	    		if($delete_kuisioner_tipe_dua){
	    			//do nothing
	    		} else{
	    			return FALSE;
	    		}
	    	}

	    	$delete_kuisioner_pertanyaan = $this->db
	    	->where('id_kuisioner_pertanyaan', $id_kuisioner_pertanyaan)
	    	->delete('kuisioner_pertanyaan');
	    	if($delete_kuisioner_pertanyaan){
	    		return TRUE;
	    	} else{
	    		return FALSE;
	    	}
	    }
	    function get_judul_kuisioner_by_tipe($tipe){
			$result = $this->db
			->select('kuisioner_judul.*,akademik_tahun_akademik.*')
			->join('akademik_tahun_akademik', 'kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('kuisioner_judul.tipe', $tipe)
			->get('kuisioner_judul');

			return $result;
		}
	    function get_hasil_kuisioner_by_jadwal($id_jadwal_master){
			$result = $this->db
			->select('kuisioner_mhs_hasil_tipe_satu.*,kuisioner_judul.*,kuisioner_pertanyaan.*,akademik_jadwal_master.*,akademik_tahun_akademik.*,akademik_matkul.*,akademik_kelas.*,tbl_dosen.*')
			->join('kuisioner_judul', 'kuisioner_mhs_hasil_tipe_satu.id_kuisioner_judul = kuisioner_judul.id_kuisioner_judul')
			->join('kuisioner_pertanyaan', 'kuisioner_mhs_hasil_tipe_satu.id_kuisioner_pertanyaan = kuisioner_pertanyaan.id_kuisioner_pertanyaan')
			->join('akademik_jadwal_master', 'kuisioner_mhs_hasil_tipe_satu.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('akademik_tahun_akademik', 'kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_matkul', 'akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_kelas', 'akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('tbl_dosen', 'akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->where('kuisioner_mhs_hasil_tipe_satu.id_jadwal_master', $id_jadwal_master)
			->get('kuisioner_mhs_hasil_tipe_satu');

			return $result;
	    }
	    function kuisioner_hasil_tipe_dua_isFilled($id_kuisioner_judul){
			$result = $this->db
			->where('id_kuisioner_judul', $id_kuisioner_judul)
			->get('kuisioner_mhs_hasil_tipe_dua');

			if($result->num_rows() > 0){
				return TRUE;
			} else{
				return FALSE;
			}
		}
		function kuisioner_hasil_tipe_satu_dosen_isFilled($nidn){
			$result = $this->db
			->select('kuisioner_mhs_hasil_tipe_satu.*,kuisioner_judul.*,kuisioner_pertanyaan.*,akademik_jadwal_master.*,akademik_tahun_akademik.*,akademik_matkul.*,akademik_kelas.*,tbl_dosen.*')
			->join('kuisioner_judul', 'kuisioner_mhs_hasil_tipe_satu.id_kuisioner_judul = kuisioner_judul.id_kuisioner_judul')
			->join('kuisioner_pertanyaan', 'kuisioner_mhs_hasil_tipe_satu.id_kuisioner_pertanyaan = kuisioner_pertanyaan.id_kuisioner_pertanyaan')
			->join('akademik_jadwal_master', 'kuisioner_mhs_hasil_tipe_satu.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('akademik_tahun_akademik', 'kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_matkul', 'akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_kelas', 'akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('tbl_dosen', 'akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->where('akademik_tahun_akademik.status = "y"')
			->where('akademik_jadwal_master.nidn', $nidn)
			->get('kuisioner_mhs_hasil_tipe_satu');

			if($result->num_rows() > 0){
				return $result;
			} else{
				return FALSE;
			}
		}
		function get_hasil_kuisioner_tipe_dua($id_kuisioner_judul){
			$result = $this->db
			->select('kuisioner_mhs_hasil_tipe_dua.*,kuisioner_judul.*,kuisioner_pertanyaan.*,akademik_tahun_akademik.*')
			->join('kuisioner_judul', 'kuisioner_mhs_hasil_tipe_dua.id_kuisioner_judul = kuisioner_judul.id_kuisioner_judul')
			->join('kuisioner_pertanyaan', 'kuisioner_mhs_hasil_tipe_dua.id_kuisioner_pertanyaan = kuisioner_pertanyaan.id_kuisioner_pertanyaan')
			->join('akademik_tahun_akademik', 'kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('kuisioner_mhs_hasil_tipe_dua.id_kuisioner_judul', $id_kuisioner_judul)
			->get('kuisioner_mhs_hasil_tipe_dua');

			return $result;
	    }

	    //KUISIONER MAHASISWA
	    function getJudul_kuisioner_mhs(){
			$result = $this->db
			->select('kuisioner_judul.*,akademik_tahun_akademik.*')
			->join('akademik_tahun_akademik','kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_tahun_akademik.status = "y"')
			->get('kuisioner_judul');

			return $result;
		}
		function kuisioner_mhs_hasil_tipe_satu_isFilled($id_kuisioner_judul, $id_jadwal_master, $nim){
			$result = $this->db
			->where('id_kuisioner_judul', $id_kuisioner_judul)
			->where('id_jadwal_master', $id_jadwal_master)
			->where('nim', $nim)
			->get('kuisioner_mhs_hasil_tipe_satu');

			if($result->num_rows() > 0){
				return TRUE;
			} else{
				return FALSE;
			}
		}
		function kuisioner_mhs_hasil_tipe_dua_isFilled($id_kuisioner_judul, $nim){
			$result = $this->db
			->where('id_kuisioner_judul', $id_kuisioner_judul)
			->where('nim', $nim)
			->get('kuisioner_mhs_hasil_tipe_dua');

			if($result->num_rows() > 0){
				return TRUE;
			} else{
				return FALSE;
			}
		}
		function get_kuisioner_mhs_hasil_tipe_satu($id_kuisioner_judul, $id_jadwal_master, $nim){
			$result = $this->db
			->select('kuisioner_mhs_hasil_tipe_satu.*,kuisioner_judul.*,kuisioner_pertanyaan.*,akademik_jadwal_master.*,akademik_tahun_akademik.*,akademik_matkul.*,akademik_kelas.*,tbl_dosen.*')
			->join('kuisioner_judul', 'kuisioner_mhs_hasil_tipe_satu.id_kuisioner_judul = kuisioner_judul.id_kuisioner_judul')
			->join('kuisioner_pertanyaan', 'kuisioner_mhs_hasil_tipe_satu.id_kuisioner_pertanyaan = kuisioner_pertanyaan.id_kuisioner_pertanyaan')
			->join('akademik_jadwal_master', 'kuisioner_mhs_hasil_tipe_satu.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('akademik_tahun_akademik', 'kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_matkul', 'akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_kelas', 'akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('tbl_dosen', 'akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->where('kuisioner_mhs_hasil_tipe_satu.id_kuisioner_judul', $id_kuisioner_judul)
			->where('kuisioner_mhs_hasil_tipe_satu.id_jadwal_master', $id_jadwal_master)
			->where('kuisioner_mhs_hasil_tipe_satu.nim', $nim)
			->get('kuisioner_mhs_hasil_tipe_satu');

			return $result;
		}
		function get_kuisioner_mhs_hasil_tipe_dua($id_kuisioner_judul, $nim){
			$result = $this->db
			->select('kuisioner_mhs_hasil_tipe_dua.*,kuisioner_judul.*,kuisioner_pertanyaan.*,akademik_tahun_akademik.*')
			->join('kuisioner_judul', 'kuisioner_mhs_hasil_tipe_dua.id_kuisioner_judul = kuisioner_judul.id_kuisioner_judul')
			->join('kuisioner_pertanyaan', 'kuisioner_mhs_hasil_tipe_dua.id_kuisioner_pertanyaan = kuisioner_pertanyaan.id_kuisioner_pertanyaan')
			->join('akademik_tahun_akademik', 'kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('kuisioner_mhs_hasil_tipe_dua.id_kuisioner_judul', $id_kuisioner_judul)
			->where('kuisioner_mhs_hasil_tipe_dua.nim', $nim)
			->get('kuisioner_mhs_hasil_tipe_dua');

			return $result;
		}
		function getTipe_kuisioner($id_kuisioner_judul){
			$this->db->where('id_kuisioner_judul', $id_kuisioner_judul);
			$query = $this->db->get('kuisioner_judul');

			return $query->row()->tipe;
		}
		function getMatkulByKRS(){
			$result = $this->db
			->select('akademik_jadwal_master.*,akademik_tahun_akademik.*,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
				akademik_krs.*,tbl_dosen.*')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('akademik_krs','akademik_jadwal_master.id_jadwal_master = akademik_krs.id_jadwal_master')
			->join('tbl_dosen','akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->where('akademik_tahun_akademik.status = "y"')
			->where('akademik_krs.nim',$this->session->kode_user)
			->get('akademik_jadwal_master');

			return $result;
		}
		function input_kuisioner_mhs_tipe_satu($id_kuisioner_judul, $id_kuisioner_pertanyaan, $id_jadwal_master, $nim, $hasil){
		   	$new_member_insert_data = array(
				'id_kuisioner_judul' => $id_kuisioner_judul,
				'id_kuisioner_pertanyaan' => $id_kuisioner_pertanyaan,
				'id_jadwal_master' => $id_jadwal_master,
				'nim' => $nim,
				'hasil' => $hasil
			);

			$insert = $this->db->insert('kuisioner_mhs_hasil_tipe_satu', $new_member_insert_data);
			if($insert){
				return 0;
			} else{
				return 1;
			}
	    }
	    function input_kuisioner_mhs_tipe_dua($id_kuisioner_judul, $id_kuisioner_pertanyaan, $nim, $hasil){
		   	$new_member_insert_data = array(
				'id_kuisioner_judul' => $id_kuisioner_judul,
				'id_kuisioner_pertanyaan' => $id_kuisioner_pertanyaan,
				'nim' => $nim,
				'hasil' => $hasil
			);

			$insert = $this->db->insert('kuisioner_mhs_hasil_tipe_dua', $new_member_insert_data);
			if($insert){
				return 0;
			} else{
				return 1;
			}
	    }
	    function kuisioner_jadwal_master_isFilled($id_jadwal_master){
	    	$new_member_insert_data = array(
				'kuisioner_isFilled' => 1
			);
			$this->db->where('id_jadwal_master', $id_jadwal_master);
			$insert = $this->db->update('akademik_jadwal_master', $new_member_insert_data);
			if($insert){
				return 0;
			} else{
				return 1;
			}
	    }
	    function kuisioner_mhs_isFilled($nim){
			$berhasil = TRUE;

			//get KRS by nim
			$krs = $this->db
			->select('akademik_krs.*,akademik_jadwal_master.*,akademik_tahun_akademik.*')
			->join('akademik_jadwal_master', 'akademik_krs.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('akademik_tahun_akademik', 'akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_tahun_akademik.status = "y"')
			->where('nim', $nim)
			->get('akademik_krs');
			if($krs->num_rows() == 0){
				$berhasil = FALSE;
			}

			//cek ada kuisioner tipe satu atau tidak
			$kuisioner_tipe_satu = $this->db
			->select('kuisioner_judul.*,akademik_tahun_akademik.*')
			->join('akademik_tahun_akademik', 'kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_tahun_akademik.status = "y"')
			->where('tipe', '1')
			->get('kuisioner_judul');
			if($kuisioner_tipe_satu->num_rows() > 0){
				//cek ada pertanyaannya atau tidak
				foreach($kuisioner_tipe_satu->result() as $judul){
					$pertanyaan_kuisioner_tipe_satu = $this->db
					->select('kuisioner_pertanyaan.*,kuisioner_judul.*')
					->join('kuisioner_judul', 'kuisioner_pertanyaan.id_kuisioner_judul = kuisioner_judul.id_kuisioner_judul')
					->where('kuisioner_pertanyaan.id_kuisioner_judul', $judul->id_kuisioner_judul)
					->get('kuisioner_pertanyaan');
					if($pertanyaan_kuisioner_tipe_satu->num_rows() != 0){
						//cek mahasiswa sudah isi kuisioner untuk matkul yang ada dalam krs atau belum
						foreach($krs->result() as $data){
							$hasil_tipe_satu = $this->db
							->where('id_kuisioner_judul', $judul->id_kuisioner_judul)
							->where('id_jadwal_master', $data->id_jadwal_master)
							->where('nim', $data->nim)
							->get('kuisioner_mhs_hasil_tipe_satu');
							if($hasil_tipe_satu->num_rows() == 0){
								$berhasil = FALSE;
							}
						}
					}
				}
			}

			//cek ada kuisioner tipe dua atau tidak
			$kuisioner_tipe_dua = $this->db
			->select('kuisioner_judul.*,akademik_tahun_akademik.*')
			->join('akademik_tahun_akademik', 'kuisioner_judul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_tahun_akademik.status = "y"')
			->where('tipe', '2')
			->get('kuisioner_judul');
			if($kuisioner_tipe_dua->num_rows() > 0){
				//cek ada pertanyaannya atau tidak
				foreach($kuisioner_tipe_dua->result() as $judul){
					$pertanyaan_kuisioner_tipe_dua = $this->db
					->select('kuisioner_pertanyaan.*,kuisioner_judul.*')
					->join('kuisioner_judul', 'kuisioner_pertanyaan.id_kuisioner_judul = kuisioner_judul.id_kuisioner_judul')
					->where('kuisioner_pertanyaan.id_kuisioner_judul', $judul->id_kuisioner_judul)
					->get('kuisioner_pertanyaan');
					if($pertanyaan_kuisioner_tipe_dua->num_rows() != 0){
						//cek mahasiswa sudah isi kuisioner untuk matkul yang ada dalam krs atau belum
						$hasil_tipe_dua = $this->db
						->where('id_kuisioner_judul', $judul->id_kuisioner_judul)
						->where('nim', $nim)
						->get('kuisioner_mhs_hasil_tipe_dua');
						if($hasil_tipe_dua->num_rows() == 0){
							$berhasil = FALSE;
						}
					}
				}
			}

			return $berhasil;
		}

		// Other
		function getPekerjaan(){
			$query = $this->db->get('app_pekerjaan');
			return $query;
		}
		public function del_users($id){
		  $this->db->where('kode_user', $id);
		  $query = $this->db->delete('tbl_users');
		  return $query;
		}
		function getAgama(){
			$query = $this->db->get('app_agama');
			return $query;
		}
		function getHari(){
			$query = $this->db->get('app_hari');
			return $query;
		}

		//MAHASISWA
		// function getJadwal_Mhs(){
		// 	$result = $this->db
		// 	->select('akademik_jadwal_matkul.*,app_hari.*,app_gedung.*,app_ruangan.nama_ruangan,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
		// 		tbl_dosen.*,akademik_tahun_akademik.*')
		// 	->join('app_hari','akademik_jadwal_matkul.id_hari = app_hari.id_hari')
		// 	->join('app_gedung','akademik_jadwal_matkul.gedung_id = app_gedung.gedung_id')
		// 	->join('app_ruangan','akademik_jadwal_matkul.ruangan_id = app_ruangan.ruangan_id')
		// 	->join('akademik_matkul','akademik_jadwal_matkul.kode_mk = akademik_matkul.kode_mk')
		// 	->join('akademik_prodi','akademik_jadwal_matkul.id_prodi = akademik_prodi.id_prodi')
		// 	->join('akademik_kelas','akademik_jadwal_matkul.id_kelas = akademik_kelas.id_kelas')
		// 	->join('tbl_dosen','akademik_jadwal_matkul.nidn = tbl_dosen.nidn')
		// 	->join('akademik_tahun_akademik','akademik_jadwal_matkul.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
		// 	->where('akademik_tahun_akademik.status = "y"')
		// 	->where('akademik_jadwal_matkul.id_kelas = '.$this->session->id_kelas)
		// 	->get('akademik_jadwal_matkul');

		// 	return $result;
		// }
		function getJadwal_Mhs(){
		    $ta = $this->getOpenTahunAkademik();
		    if ($ta != 0 ){
		        $result = $this->db
			->select('akademik_jadwal_matkul.*,akademik_krs.*,app_hari.*,app_gedung.*,app_ruangan.nama_ruangan,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
				tbl_dosen.*,akademik_tahun_akademik.*,akademik_jadwal_master.*')
			->join('akademik_krs', 'akademik_jadwal_matkul.id_jadwal_master = akademik_krs.id_jadwal_master')
			->join('app_hari','akademik_jadwal_matkul.id_hari = app_hari.id_hari')
			->join('app_gedung','akademik_jadwal_matkul.gedung_id = app_gedung.gedung_id')
			->join('app_ruangan','akademik_jadwal_matkul.ruangan_id = app_ruangan.ruangan_id')
			->join('akademik_jadwal_master','akademik_jadwal_matkul.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('tbl_dosen','akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_tahun_akademik.status = "y"')
			->where('akademik_krs.nim = '.$this->session->kode_user)
			->get('akademik_jadwal_matkul');
    			if($result->num_rows()>0){
    			    return $result;
    			}else{
    			    return 0;
    			}
		    }else{
		        return 0;
		    }




		}
		function getJadwal_ujian_Mhs(){
			$result = $this->db
			->select('akademik_jadwal_ujian.*,akademik_jadwal_master.*,app_hari.*,app_gedung.*,app_ruangan.nama_ruangan,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,akademik_tahun_akademik.*')
			->join('akademik_jadwal_master','akademik_jadwal_ujian.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('app_hari','akademik_jadwal_ujian.id_hari = app_hari.id_hari')
			->join('app_gedung','akademik_jadwal_ujian.gedung_id = app_gedung.gedung_id')
			->join('app_ruangan','akademik_jadwal_ujian.ruangan_id = app_ruangan.ruangan_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_tahun_akademik.status = "y"')
			->where('akademik_jadwal_master.id_kelas = '.$this->session->id_kelas)
			->get('akademik_jadwal_ujian');

			return $result;
		}
		function input_matkul_mhs(){

		}
		function getNilai_Mhs(){
			$result = $this->db
			->select('akademik_nilai.*,akademik_jadwal_master.*,akademik_matkul.*')
			->join('akademik_jadwal_master','akademik_nilai.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->where('akademik_nilai.nim', $this->session->kode_user)
			->get('akademik_nilai');
			return $result;
		}
		function getNilai_IPS(){
			$query = $this->db
			->select('akademik_nilai.*,akademik_jadwal_master.*,akademik_matkul.*,akademik_tahun_akademik.*')
			->join('akademik_jadwal_master','akademik_nilai.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('akademik_tahun_akademik', 'akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->where('akademik_tahun_akademik.status = "y"')
			->where('akademik_nilai.nim', $this->session->kode_user)
			->get('akademik_nilai');

			if ($query->num_rows()>0) {
				$jumlah_nilai = 0;
				$total_nilai = 0;
				$total_sks = 0;

				foreach($query->result() as $data){
					$jumlah_nilai += 1;
					$total_sks += $data->sks_mk;

					if($data->nilai == "A"){
						$total_nilai += 4 * $data->sks_mk;
					} elseif($data->nilai == "AB"){
						$total_nilai += 3.5 * $data->sks_mk;
					} elseif($data->nilai == "B"){
						$total_nilai += 3 * $data->sks_mk;
					} elseif($data->nilai == "BC"){
						$total_nilai += 2.5 * $data->sks_mk;
					} elseif($data->nilai == "C"){
						$total_nilai += 2 * $data->sks_mk;
					} elseif($data->nilai == "D"){
						$total_nilai += 1.5 * $data->sks_mk;
					}
				}

				$result = ($total_nilai / $total_sks);
				return $result;
			}
		}
		function getNilai_IPK(){
			$query = $this->db
			->select('akademik_nilai.*,akademik_jadwal_master.*,akademik_matkul.*,akademik_tahun_akademik.*')
			->join('akademik_jadwal_master','akademik_nilai.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('akademik_tahun_akademik', 'akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->where('akademik_nilai.nim', $this->session->kode_user)
			->get('akademik_nilai');

			$jumlah_nilai = 0;
			$total_nilai = 0;
			$total_sks = 0;
			if ($query->num_rows()>0) {
			foreach($query->result() as $data){
				$jumlah_nilai += 1;
				$total_sks += $data->sks_mk;

				if($data->nilai == "A"){
					$total_nilai += 4 * $data->sks_mk;
				} elseif($data->nilai == "AB"){
					$total_nilai += 3.5 * $data->sks_mk;
				} elseif($data->nilai == "B"){
					$total_nilai += 3 * $data->sks_mk;
				} elseif($data->nilai == "BC"){
					$total_nilai += 2.5 * $data->sks_mk;
				} elseif($data->nilai == "C"){
					$total_nilai += 2 * $data->sks_mk;
				} elseif($data->nilai == "D"){
					$total_nilai += 1.5 * $data->sks_mk;
				}
			}

			$result = ($total_nilai / $total_sks);
			return $result;}

		}
		function getUsers(){
			$query = $this->db->get('tbl_users');
			return $query;
		}
		function update_MHS_MHS($data){

      		$new_member_insert_data = array(
        	'nim' => $data['nim'],
        	'nama' => $data['nama'],
        	'alamat' => $data['alamat'],
        	'gender' => $data['optionsRadios'],
        	'agama_id' => $data['agama'],
        	'tempat_lahir' => $data['tmpt_lahir'],
        	'tanggal_lahir' => $data['tgl_lahir'],
        	'nama_ibu' => $data['nama_ibu'],
        	'nama_ayah' => $data['nama_ayah'],
        	'no_hp_ortu' => $data['no_telp'],
        	'pekerjaan_id_ibu' => $data['ID_p_ibu'],
        	'pekerjaan_id_ayah' => $data['ID_p_bpk'],
        	'alamat_ayah' => $data['alamat_ayah'],
        	'alamat_ibu' => $data['alamat_ibu'],
        	'penghasilan_ayah' => $data['hasil_ayah'],
        	'penghasilan_ibu' => $data['hasil_ibu'],
        	'sekolah_nama' => $data['nama_sekolah'],
        	'sekolah_telpon' => $data['notelp_sekolah'],
        	'sekolah_alamat' => $data['alamat_sekolah']
      		);

      		$this->db->where('nim', $data['nim']);
      		$insert = $this->db->update('tbl_mahasiswa', $new_member_insert_data);
      		$new_member_insert_data = array(
        		'display_name' => $data['nama']
      		);

      		$this->db->where('kode_user', $data['nim']);
      		$wak = $this->db->update('tbl_users', $new_member_insert_data);


      		if ($insert && $wak) {
        		return true;
      		}else{
        		return false;
      		}
    	}

		public function get_count_record($table)
    {
        $query = $this->db->count_all($table);

        return $query;
    }


    public function disk_totalspace($dir = DIRECTORY_SEPARATOR)
    {
        return disk_total_space($dir);
    }


    public function disk_freespace($dir = DIRECTORY_SEPARATOR)
    {
        return disk_free_space($dir);
    }


    public function disk_usespace($dir = DIRECTORY_SEPARATOR)
    {
        return $this->disk_totalspace($dir) - $this->disk_freespace($dir);
    }


    public function disk_freepercent($dir = DIRECTORY_SEPARATOR, $display_unit = FALSE)
    {
        if ($display_unit === FALSE)
        {
            $unit = NULL;
        }
        else
        {
            $unit = ' %';
        }

        return round(($this->disk_freespace($dir) * 100) / $this->disk_totalspace($dir), 0).$unit;
    }


    public function disk_usepercent($dir = DIRECTORY_SEPARATOR, $display_unit = FALSE)
    {
        if ($display_unit === FALSE)
        {
            $unit = NULL;
        }
        else
        {
            $unit = ' %';
        }

        return round(($this->disk_usespace($dir) * 100) / $this->disk_totalspace($dir), 0).$unit;
    }


    public function memory_usage()
    {
        return memory_get_usage();
    }


    public function memory_peak_usage($real = TRUE)
    {
        if ($real)
        {
            return memory_get_peak_usage(TRUE);
        }
        else
        {
            return memory_get_peak_usage(FALSE);
        }
    }


    public function memory_usepercent($real = TRUE, $display_unit = FALSE)
    {
        if ($display_unit === FALSE)
        {
            $unit = NULL;
        }
        else
        {
            $unit = ' %';
        }

        return round(($this->memory_usage() * 100) / $this->memory_peak_usage($real), 0).$unit;
    }
    function getAkademik(){
    	$query = $this->db->get('akademik_tahun_akademik');
			return $query;
    }
    function input_TahunAkademik($data){
    	$new_member_insert_data = array(
			'keterangan' => $data['tahun_akademik'].$data['optionsRadios1'],
			'batas_registrasi' => $data['bts_regis'],
			'status' => $data['optionsRadios'],
			'tahun' => $data['tahun_akademik']
		);
		$insert = $this->db->insert('akademik_tahun_akademik', $new_member_insert_data);
		return $insert;
    }
    function update_TahunAkademik($data){
		$new_member_insert_data = array(
			'status' => $data['optionsRadios'],
			'batas_registrasi' => $data['bts_regis']
		);
		$this->db->where('tahun_akademik_id', $data['tahun_akademik_id']);
		$insert = $this->db->update('akademik_tahun_akademik', $new_member_insert_data);
		return $insert;
	}
	function getSatuTahunAkademik($data){
			$this->db->where('tahun_akademik_id', $data);
			$query = $this->db->get('akademik_tahun_akademik');
			return $query;
		}
		function getTahunAkademik($data){
			$quers = $this->db->get_where('akademik_tahun_akademik',array('status' => 'y'));
			return $quers;

		}
		//------------------------------KEUANGAN---------------------------------------------//
		function input_Pembayaran($data){
			$this->db->where('id_tahun_akademik',$data['id_tahun_akademik']);
			$this->db->where('semester',$data['semester']);
			$this->db->where('nim',$data['nim']);
	        $result = $this->db->get('keuangan_transaksi');

	        if($result->num_rows() == 1){
	        	return 1;
	        } else{
	        	$this->db->where('semester',$data['semester']);
				$this->db->where('nim',$data['nim']);
		        $result = $this->db->get('keuangan_transaksi');

		        if($result->num_rows() == 1){
		        	return 1;
		        } else{
			    	$new_member_insert_data = array(
						'id_tahun_akademik' => $data['id_tahun_akademik'],
						'semester' => $data['semester'],
						'nim' => $data['nim'],
						'jumlah_pembayaran' => $data['jumlah_pembayaran'],
						'status_pembayaran_mhs' => $data['status'],
						'tanggal' => $data['tanggal'],
					);
					$insert = $this->db->insert('keuangan_transaksi', $new_member_insert_data);
					return 0;
		        }
			}
	    }

		function getStatusPembayaran(){
			$result = $this->db
			->select('keuangan_transaksi.*,akademik_tahun_akademik.*,keuangan_biaya.*')
			->join('akademik_tahun_akademik','keuangan_transaksi.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('keuangan_biaya','keuangan_transaksi.id_biaya = keuangan_biaya.id_biaya')
			->get('keuangan_transaksi');
			return $result;
		}
		function getStatusPembayaranByOrder($id){
			if ($id == 1) {
				$result = $this->db
				->select('keuangan_transaksi.*,akademik_tahun_akademik.*,keuangan_biaya.*')
				->join('akademik_tahun_akademik','keuangan_transaksi.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
				->join('keuangan_biaya','keuangan_transaksi.id_biaya = keuangan_biaya.id_biaya')
				->get('keuangan_transaksi');
			}else if ($id == 2) {
				$result = $this->db
				->select('keuangan_transaksi.*,akademik_tahun_akademik.*,keuangan_biaya.*')
				->join('akademik_tahun_akademik','keuangan_transaksi.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
				->join('keuangan_biaya','keuangan_transaksi.id_biaya = keuangan_biaya.id_biaya')
				->where('keuangan_transaksi.status_pembayaran_mhs',1)
				->get('keuangan_transaksi');
			}else if ($id == 3) {
				$result = $this->db
				->select('keuangan_transaksi.*,akademik_tahun_akademik.*,keuangan_biaya.*')
				->join('akademik_tahun_akademik','keuangan_transaksi.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
				->join('keuangan_biaya','keuangan_transaksi.id_biaya = keuangan_biaya.id_biaya')
				->where('keuangan_transaksi.status_pembayaran_mhs',2)
				->get('keuangan_transaksi');
			}else if ($id == 4) {
				$result = $this->db
				->select('keuangan_transaksi.*,akademik_tahun_akademik.*,keuangan_biaya.*')
				->join('akademik_tahun_akademik','keuangan_transaksi.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
				->join('keuangan_biaya','keuangan_transaksi.id_biaya = keuangan_biaya.id_biaya')
				->where('keuangan_transaksi.status_pembayaran_mhs',3)
				->get('keuangan_transaksi');
			}

			return $result;
		}
		function getStatusPembayaranSatu(){
			$result = $this->db
			->select('keuangan_transaksi.*,akademik_tahun_akademik.*,keuangan_biaya.*')
			->join('akademik_tahun_akademik','keuangan_transaksi.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('keuangan_biaya','keuangan_transaksi.id_biaya = keuangan_biaya.id_biaya')
			->where('nim',$this->session->kode_user)
			->get('keuangan_transaksi');
			return $result;
		}
		function getStatusPembayaranMhsByThnAkd($id){
			$query = $this->db->get_where('keuangan_transaksi',array('nim' => $id,'id_tahun_akademik'=>$this->getOpenTahunAkademik()));
			if ($query->num_rows()>0) {
				return $query->row()->status_pembayaran_mhs;
			}else{
				return 0;
			}


		}

		function update_Pembayaran($data){
			$new_member_insert_data = array(
				'status_pembayaran_mhs' => $data['status']
			);
			$this->db->where('id_transaksi', $data['id_transaksi']);
			$insert = $this->db->update('keuangan_transaksi', $new_member_insert_data);
			return $insert;
		}

		function getSatuPembayaran($data){
			$this->db->where('id_transaksi', $data);
			$query = $this->db->get('keuangan_transaksi');
			return $query;
		}

		function getOpenTahunAkademik()
		{
			$quers = $this->db->get_where('akademik_tahun_akademik',array('status' => 'y'));
			if ($quers->num_rows()>0) {
					return $quers->row()->tahun_akademik_id;
			}else{
				return 0;
			}
		}
		function getStatusPembayaranMhs($id)
		{
			$query = $this->db->get_where('keuangan_transaksi',array('nim' => $id,'id_tahun_akademik'=>$this->getOpenTahunAkademik()));
			if ($query->num_rows() == 0) {
				$sts = 0;
			}else {
				if($query->row()->status_pembayaran_mhs == 1){
					$sts = 1;
				}else if($query->row()->status_pembayaran_mhs == 2){
					$sts = 2;
				}else if($query->row()->status_pembayaran_mhs == 3){
					$sts = 3;
				}
			}
			return $sts;
		}
		//------------------------------KEUANGAN---------------------------------------------//

		//------------------------------BIAYA---------------------------------------------//
		function input_Biaya($data){
			$this->db->where('id_tahun_akademik',$data['id_tahun_akademik']);
			$this->db->where('id_prodi',$data['id_prodi']);
	        $result = $this->db->get('keuangan_biaya');

	        if($result->num_rows() == 1){
	        	return 1;
	        } else{
		    	$new_member_insert_data = array(
					'id_tahun_akademik' => $data['id_tahun_akademik'],
					'id_prodi' => $data['id_prodi'],
					'jenis_pembayaran' => $data['jenis_p'],
					'bulan' => $data['bulan'],
					'jumlah_biaya' => $data['jumlah_biaya']
				);
				$insert = $this->db->insert('keuangan_biaya', $new_member_insert_data);
				return 0;
			}
	    }
	    function getBiaya(){
			$result = $this->db
			->select('keuangan_biaya.*,akademik_tahun_akademik.*,akademik_prodi.*')
			->join('akademik_tahun_akademik','keuangan_biaya.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_prodi','keuangan_biaya.id_prodi = akademik_prodi.id_prodi')
			->get('keuangan_biaya');

			return $result;
		}
		function getCurrentBiaya(){
			$result = $this->db
			->select('keuangan_biaya.*,akademik_tahun_akademik.*,akademik_prodi.*')
			->join('akademik_tahun_akademik','keuangan_biaya.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_prodi','keuangan_biaya.id_prodi = akademik_prodi.id_prodi')
			->where('akademik_tahun_akademik.status = "y"')
			->get('keuangan_biaya');

			return $result;
		}
		function getSatuBiaya($data){
			$result = $this->db
			->select('keuangan_biaya.*,akademik_tahun_akademik.*,akademik_prodi.*')
			->join('akademik_tahun_akademik','keuangan_biaya.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_prodi','keuangan_biaya.id_prodi = akademik_prodi.id_prodi')
			->where('id_biaya', $data)
			->get('keuangan_biaya');

			return $result;

			// $this->db->where('id_biaya', $data);
			// $query = $this->db->get('keuangan_biaya');
			// return $query;
		}
		function update_Biaya($data){
			$new_member_insert_data = array(
				'jumlah_biaya' => $data['jumlah_biaya']
			);
			$this->db->where('id_biaya', $data['id_biaya']);
			$insert = $this->db->update('keuangan_biaya', $new_member_insert_data);
			return $insert;
		}
		//------------------------------BIAYA---------------------------------------------//

		//------------------------------Registrasi-------------------------------------------//
		function addNewRegistrasi($data){
			$query = $this->db->get_where('keuangan_transaksi',array('nim' => $data['nim'], 'id_tahun_akademik' => $this->getOpenTahunAkademik(), 'status_pembayaran_mhs' => '1'));
			if ($query->num_rows() > 0) {
		    $new_member_insert_data = array(
					'id_transaksi' => $query->row()->id_transaksi,
					'tanggal' => $query->row()->tanggal,
					'status_regis' => 0
				);
				$insert = $this->db->insert('akademik_registrasi', $new_member_insert_data);
				return $insert;
			}else{
				return 1;
			}
		}

		function getStatusRegistrasi(){
			$result = $this->db
			->select('akademik_registrasi.*,akademik_tahun_akademik.*,keuangan_transaksi.*')
			->join('keuangan_transaksi','akademik_registrasi.id_transaksi = keuangan_transaksi.id_transaksi')
			->join('akademik_tahun_akademik','keuangan_transaksi.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->get('akademik_registrasi');
			return $result;
		}
		function getSatuRegistrasi($data){
			$result = $this->db
			->select('akademik_registrasi.*,akademik_tahun_akademik.*,keuangan_transaksi.*')
			->join('keuangan_transaksi','akademik_registrasi.id_transaksi = keuangan_transaksi.id_transaksi')
			->join('akademik_tahun_akademik','keuangan_transaksi.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('id_registrasi', $data)
			->get('akademik_registrasi');
			return $result;
		}
		function update_Registrasi($data){
			$new_member_insert_data = array(
				'status_regis' => $data['optionsRadios']
			);
			$this->db->where('id_registrasi', $data['id_registrasi']);
			$insert = $this->db->update('akademik_registrasi', $new_member_insert_data);
			return $insert;
		}
		function getIdTx($nim){
			$query = $this->db->get_where('keuangan_transaksi',array('nim' => $nim, 'id_tahun_akademik' => $this->getOpenTahunAkademik(), 'status_pembayaran_mhs' => '1'));
			if ($query->num_rows() > 0) {
				$idtx = $query->row()->id_transaksi;
			}else{
				$idtx = 0;
			}
			return $idtx;
		}
		function getStatusRegisMhs($id)
		{
			$query = $this->db->get_where('akademik_registrasi',array('id_transaksi'=> $this->getIdTx($this->session->kode_user)));
			if ($query->num_rows() > 0) {
				if ($query->row()->status_regis == 1) {
					$sts = 1;
				}else if ($query->row()->status_regis == 2) {
					$sts = 2;
				}else if ($query->row()->status_regis == 3) {
					$sts = 3;
				}else{
					$sts = 0;
				}
			}else {
				$sts = 0;
			}
			return $sts;
		}
		function getJadwal_tingkat($tingkat){
			$ta = $this->getOpenTahunAkademik();
			$result = $this->db
			->select('akademik_jadwal_master.*,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,akademik_tahun_akademik.*')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_matkul.tingkat = '.$tingkat)
			->where('akademik_jadwal_master.id_tahun_akademik = '.$ta)
			->where('akademik_jadwal_master.id_prodi = '.$this->session->id_prodi)
			->get('akademik_jadwal_master');
			return $result;
		}

			function gettemp_krs(){
				$ta = $this->getOpenTahunAkademik();
				$result = $this->db
				->select('akademik_jadwal_master.*,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,akademik_tahun_akademik.*,temp_krs.*')
				->join('akademik_jadwal_master','akademik_jadwal_master.id_jadwal_master = temp_krs.id_jadwal_master')
				->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
				->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
				->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
				->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
				->where('akademik_jadwal_master.id_tahun_akademik = '.$ta)
				->where('akademik_jadwal_master.id_prodi = '.$this->session->id_prodi)
				->where('nim',$this->session->kode_user)
				->get('temp_krs');
				return $result;
		}
			function getSpecTemp_krs($id){
				$ta = $this->getOpenTahunAkademik();
				$result = $this->db
				->select('akademik_jadwal_master.*,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,akademik_tahun_akademik.*,temp_krs.*')
				->join('akademik_jadwal_master','akademik_jadwal_master.id_jadwal_master = temp_krs.id_jadwal_master')
				->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
				->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
				->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
				->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
				->where('akademik_jadwal_master.id_tahun_akademik = '.$ta)
				->where('nim',$id)
				->get('temp_krs');
				return $result;
			}


		function getSatuTemp_krs($nim){
			$this->db->where('nim', $nim);
			$result = $this->db->get('temp_krs');
			return $result;
		}
		function deleteSatuTemp_krs($nim){
			$this->db->where('nim', $nim);
			$result = $this->db->delete('temp_krs');
			return $result;
		}
		function tambahSemesterMhs($nim){
			$sms = $this->db
			->where('nim', $nim)
			->get('tbl_mahasiswa');

			if($sms){
				$sms_baru = $sms->row()->semester_aktif + 1;

				$new_member_insert_data = array(
					'semester_aktif' => $sms_baru
				);
				$this->db->where('nim', $nim);
				$insert = $this->db->update('tbl_mahasiswa', $new_member_insert_data);

				if($insert){
					return 0;
				} else{
					return 1;
				}
			} else{
				return 1;
			}
		}

		function input_temp_mk($id){
			$new_member_insert_data = array(
				'nim' => $this->session->kode_user,
				'id_jadwal_master' => $id,
				'semester' => 0

			);
			$insert = $this->db->insert('temp_krs', $new_member_insert_data);
			return 0;

		}

		function input_krs($data){
			$new_member_insert_data = array(
				'nim' => $data['nim'],
				'id_jadwal_master' => $data['id_jadwal_master'],
				'semester' => $data['semester']
			);
			$insert = $this->db->insert('akademik_krs', $new_member_insert_data);
			if($insert){
				return 0;
			} else{
				return 1;
			}
		}

		function input_temp_krs($nim){
			$new_member_insert_data = array(
				'status_regis' => 2
			);
			$this->db->where('id_transaksi', $this->getIdTx($nim));
			$insert = $this->db->update('akademik_registrasi', $new_member_insert_data);
			return $insert;
		}

		function getStatusKRS(){
			$result = $this->db
			->select('akademik_registrasi.*,akademik_tahun_akademik.*,keuangan_transaksi.*')
			->join('keuangan_transaksi','akademik_registrasi.id_transaksi = keuangan_transaksi.id_transaksi')
			->join('akademik_tahun_akademik','keuangan_transaksi.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('status_regis',1)
			->get('akademik_registrasi');
			return $result;
		}

	//--------------------------------DOSEN---------------------------------------------//
		function getJadwal_Dsn(){
			$result = $this->db
			->select('akademik_jadwal_master.*,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
				tbl_dosen.*,akademik_tahun_akademik.*,app_hari.*,akademik_jadwal_matkul.*,app_ruangan.nama_ruangan')
			->join('akademik_jadwal_matkul','akademik_jadwal_master.id_jadwal_master = akademik_jadwal_matkul.id_jadwal_master')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('app_hari','akademik_jadwal_matkul.id_hari = app_hari.id_hari')
			->join('app_ruangan','akademik_jadwal_matkul.ruangan_id = app_ruangan.ruangan_id')
			->join('tbl_dosen','akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_tahun_akademik.status = "y"')
			->where('tbl_dosen.nidn', $this->session->kode_user)
			->get('akademik_jadwal_master');

			return $result;
		}

		function getPresensi($id){
			$result = $this->db
			->select('akademik_presensi.*,akademik_jadwal_matkul.*,akademik_jadwal_master.*,app_hari.*,app_gedung.*,app_ruangan.nama_ruangan,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
				tbl_dosen.*,akademik_tahun_akademik.*')
			->join('akademik_jadwal_matkul','akademik_presensi.id_jadwal_matkul = akademik_jadwal_matkul.id_jadwal_matkul')
			->join('akademik_jadwal_master','akademik_jadwal_master.id_jadwal_master = akademik_jadwal_matkul.id_jadwal_master')
			->join('app_hari','akademik_jadwal_matkul.id_hari = app_hari.id_hari')
			->join('app_gedung','akademik_jadwal_matkul.gedung_id = app_gedung.gedung_id')
			->join('app_ruangan','akademik_jadwal_matkul.ruangan_id = app_ruangan.ruangan_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('tbl_dosen','akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_tahun_akademik.status = "y"')
			->where('akademik_jadwal_matkul.id_jadwal_matkul', $id)
			->get('akademik_presensi');

			return $result;
		}
		public function getJumPresensiPerJadwal($id_jadwal){
			$result = $this->db
			->select('akademik_presensi.*,akademik_jadwal_matkul.*')
			->join('akademik_jadwal_matkul','akademik_jadwal_matkul.id_jadwal_matkul = akademik_presensi.id_jadwal_matkul')
			->where('akademik_jadwal_matkul.id_jadwal_master',$id_jadwal)
			->get('akademik_presensi');

			return $result->num_rows();
		}
		function getMhsPresensi(){
			$ta = $this->getOpenTahunAkademik();
			$result = $this->db
			->select('akademik_krs.*,akademik_jadwal_master.*,akademik_matkul.*')
			->join('akademik_jadwal_master','akademik_jadwal_master.id_jadwal_master = akademik_krs.id_jadwal_master')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->where('nim',$this->session->kode_user)
			->where('akademik_jadwal_master.id_tahun_akademik',$ta)
			->get('akademik_krs');

			return $result;
		}
		public function getJumKehadiran($id_jadwal,$nim){
			$result = $this->db
			->select('akademik_presensi.*,akademik_jadwal_matkul.*,akademik_kehadiran_mhs.*')
			->join('akademik_jadwal_matkul','akademik_jadwal_matkul.id_jadwal_matkul = akademik_presensi.id_jadwal_matkul')
			->join('akademik_kehadiran_mhs','akademik_kehadiran_mhs.id_presensi = akademik_presensi.id_presensi')
			->where('akademik_jadwal_matkul.id_jadwal_master',$id_jadwal)
			->where('nim',$nim)
			->where('akademik_kehadiran_mhs.kehadiran = 0')
			->get('akademik_presensi');

			return $result->num_rows();
		}

		function getSatuPresensi($id){
			$result = $this->db
			->select('akademik_presensi.*,akademik_jadwal_matkul.*,akademik_jadwal_master.*,app_hari.*,app_gedung.*,app_ruangan.nama_ruangan,akademik_matkul.*,akademik_prodi.*,akademik_kelas.*,
				tbl_dosen.*,akademik_tahun_akademik.*')
			->join('akademik_jadwal_matkul','akademik_presensi.id_jadwal_matkul = akademik_jadwal_matkul.id_jadwal_matkul')
			->join('akademik_jadwal_master','akademik_jadwal_master.id_jadwal_master = akademik_jadwal_matkul.id_jadwal_master')
			->join('app_hari','akademik_jadwal_matkul.id_hari = app_hari.id_hari')
			->join('app_gedung','akademik_jadwal_matkul.gedung_id = app_gedung.gedung_id')
			->join('app_ruangan','akademik_jadwal_matkul.ruangan_id = app_ruangan.ruangan_id')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_prodi','akademik_jadwal_master.id_prodi = akademik_prodi.id_prodi')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('tbl_dosen','akademik_jadwal_master.nidn = tbl_dosen.nidn')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_tahun_akademik.status = "y"')
			->where('akademik_presensi.id_presensi', $id)
			->get('akademik_presensi');

			return $result;
		}

		function getPresensiMHS($id){
			$result = $this->db
			->select('akademik_presensi.*,akademik_jadwal_matkul.*,akademik_jadwal_master.*,akademik_tahun_akademik.*,akademik_krs.*,tbl_mahasiswa.*,akademik_kelas.*')
			->join('akademik_jadwal_matkul','akademik_presensi.id_jadwal_matkul = akademik_jadwal_matkul.id_jadwal_matkul')
			->join('akademik_jadwal_master','akademik_jadwal_master.id_jadwal_master = akademik_jadwal_matkul.id_jadwal_master')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('akademik_krs','akademik_jadwal_matkul.id_jadwal_master = akademik_krs.id_jadwal_master')
			->join('tbl_mahasiswa','akademik_krs.nim = tbl_mahasiswa.nim')
			->where('akademik_tahun_akademik.status = "y"')
			->where('akademik_presensi.id_presensi', $id)
			->get('akademik_presensi');

			return $result;
		}

		function getKehadiranMHS($id){
			$result = $this->db
			->select('akademik_kehadiran_mhs.*,akademik_presensi.*,tbl_mahasiswa.*')
			->join('akademik_presensi', 'akademik_kehadiran_mhs.id_presensi = akademik_presensi.id_presensi')
			->join('tbl_mahasiswa','akademik_kehadiran_mhs.nim = tbl_mahasiswa.nim')
			->where('akademik_kehadiran_mhs.id_presensi', $id)
			->get('akademik_kehadiran_mhs');

			return $result;
		}

		function input_Presensi($data){
			$this->db->where('id_jadwal_matkul',$data['id_jadwal_matkul']);
			$this->db->where('pertemuan',$data['pertemuan']);
	        $result = $this->db->get('akademik_presensi');

	        if($result->num_rows() == 1){
	        	return 1;
	        } else{
		    	$new_member_insert_data = array(
					'pertemuan' => $data['pertemuan'],
					'judul_pertemuan' => $data['j_pert'],
					'tanggal' => $data['tanggal'],
					'id_jadwal_matkul' => $data['id_jadwal_matkul'],
					'is_filled' => 0
				);
				$insert = $this->db->insert('akademik_presensi', $new_member_insert_data);
				if($insert){
					//get presensi by id_jadwal_matkul & pertemuan yang baru saja diinput untuk dpt id_presensi
					$this->db->where('id_jadwal_matkul',$data['id_jadwal_matkul']);
					$this->db->where('pertemuan',$data['pertemuan']);
			        $result = $this->db->get('akademik_presensi');
					return $result->row()->id_presensi;
				} else{
					return false;
				}
			}
	    }

	    function presensi_isFilled($id_presensi){
	    	$new_member_insert_data = array(
				'is_filled' => 1
			);
			$this->db->where('id_presensi', $id_presensi);
			$insert = $this->db->update('akademik_presensi', $new_member_insert_data);
			if($insert){
				return 0;
			} else{
				return 1;
			}
	    }

	    function del_Presensi($id_presensi){
	    	//cek kehadiran
	    	$akademik_kehadiran_mhs = $this->db
	    	->where('id_presensi', $id_presensi)
	    	->get('akademik_kehadiran_mhs');
	    	if($akademik_kehadiran_mhs->num_rows() > 0){
	    		$delete_kehadiran = $this->db
	    		->where('id_presensi', $id_presensi)
	    		->delete('akademik_kehadiran_mhs');
	    		if($delete_kehadiran){
	    			$delete_presensi = $this->db
	    			->where('id_presensi', $id_presensi)
	    			->delete('akademik_presensi');
	    			if($delete_presensi){
	    				return TRUE;
	    			} else{
	    				return FALSE;
	    			}
	    		} else{
	    			return FALSE;
	    		}
	    	} else{
	    		$delete_presensi = $this->db
	    		->where('id_presensi', $id_presensi)
	    		->delete('akademik_presensi');
	    		if($delete_presensi){
	    			return TRUE;
	    		} else{
	    			return FALSE;
	    		}
	    	}
		}

	    function input_Kehadiran($id_presensi, $nim, $kehadiran){
		   	$new_member_insert_data = array(
				'id_presensi' => $id_presensi,
				'nim' => $nim,
				'kehadiran' => $kehadiran
			);

			$insert = $this->db->insert('akademik_kehadiran_mhs', $new_member_insert_data);
			if($insert){
				return 0;
			} else{
				return 1;
			}
	    }

	    function update_Kehadiran($id_presensi, $nim, $kehadiran){
			$this->db->where('id_presensi', $id_presensi);
			$this->db->where('nim', $nim);
	        $result = $this->db->get('akademik_kehadiran_mhs');

	        if($result->num_rows()==1){
	            $new_member_insert_data = array(
					'kehadiran' => $kehadiran
				);
				$this->db->where('id_presensi', $id_presensi);
				$this->db->where('nim', $nim);
				$insert = $this->db->update('akademik_kehadiran_mhs', $new_member_insert_data);
				return 0;
	        }else{
	        	return 1;
	        }
	    }

		function getMhsByJadwalAtKrs($id_jadwal){
			$result = $this->db
			->select('akademik_jadwal_master.*,akademik_krs.*,tbl_mahasiswa.*,akademik_kelas.*,akademik_matkul.*,akademik_tahun_akademik.*')

			->join('akademik_krs','akademik_jadwal_master.id_jadwal_master = akademik_krs.id_jadwal_master')
			->join('tbl_mahasiswa','akademik_krs.nim = tbl_mahasiswa.nim')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_jadwal_master.id_jadwal_master', $id_jadwal)
			->where('akademik_jadwal_master.nidn', $this->session->kode_user)

			->get('akademik_jadwal_master');
				return $result;
		}

		function input_Nilai($id_jadwal_master, $nim, $nilai){
		   	$new_member_insert_data = array(
				'id_jadwal_master' => $id_jadwal_master,
				'nim' => $nim,
				'nilai' => $nilai
			);

			$insert = $this->db->insert('akademik_nilai', $new_member_insert_data);
			if($insert){
				return 0;
			} else{
				return 1;
			}
	    }

	    function nilai_isFilled($id_jadwal_master){
	    	$new_member_insert_data = array(
				'nilai_is_filled' => 1
			);
			$this->db->where('id_jadwal_master', $id_jadwal_master);
			$insert = $this->db->update('akademik_jadwal_master', $new_member_insert_data);
			if($insert){
				return 0;
			} else{
				return 1;
			}
	    }

	    function getMhsAtNilai($id_jadwal){
			$result = $this->db
			->select('akademik_nilai.*,akademik_jadwal_master.*,tbl_mahasiswa.*,akademik_kelas.*,akademik_kelas.*,akademik_tahun_akademik.*')
			->join('akademik_jadwal_master','akademik_nilai.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			->join('tbl_mahasiswa','akademik_nilai.nim = tbl_mahasiswa.nim')
			->join('akademik_kelas','akademik_jadwal_master.id_kelas = akademik_kelas.id_kelas')
			->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
			->join('akademik_tahun_akademik','akademik_jadwal_master.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->where('akademik_jadwal_master.id_jadwal_master', $id_jadwal)
			->where('akademik_nilai.id_jadwal_master', $id_jadwal)
			->get('akademik_nilai');
			return $result;
		}

		function update_Nilai($id_jadwal_master, $nim, $nilai){
			$this->db->where('id_jadwal_master', $id_jadwal_master);
			$this->db->where('nim', $nim);
	        $result = $this->db->get('akademik_nilai');

	        if($result->num_rows()==1){
	            $new_member_insert_data = array(
					'nilai' => $nilai
				);
				$this->db->where('id_jadwal_master', $id_jadwal_master);
				$this->db->where('nim', $nim);
				$insert = $this->db->update('akademik_nilai', $new_member_insert_data);
				return 0;
	        }else{
	        	return 1;
	        }
	    }

	    function update_Dosen_Dosen($data){
	      	$new_member_insert_data = array(
	        	'nama_lengkap' => $data['nama_lengkap'],
	        	// 'nidn' => $data['nidn'],
	        	'nip' => $data['nip'],
	        	'no_ktp' => $data['no_ktp'],
	        	'tempat_lahir' => $data['tempat_lahir'],
	        	'tanggal_lahir' => $data['tanggal_lahir'],
	        	'gender' => $data['optionsRadios'],
	        	'agama_id' => $data['agama_id'],
	        	'status_kawin' => $data['status_kawin'],
	        	'gelar_pendidikan' => $data['gelar_pendidikan'],
	        	'alamat' => $data['alamat'],
	        	'hp' => $data['hp'],
	        	'email' => $data['email']
	      	);
	      	$this->db->where('nidn', $data['nidn']);
	      	$insert = $this->db->update('tbl_dosen', $new_member_insert_data);
	      	$new_member_insert_data=array(
	        	'display_name'=>$data['nama_lengkap']
	      	);
	      	$this->db->where('kode_user', $data['nidn']);
	      	$wak = $this->db->update('tbl_users', $new_member_insert_data);


	      	if ($insert && $wak) {
	        	return true;
	      	}else{
	        	return false;
	      	}
	    }


	//------------------------------END DOSEN-------------------------------------------//

	//---------BAAAARUUUUUUU------//
			function getNameSatuPekerjaan($data){
				$this->db->where('pekerjaan_id', $data);
				$query = $this->db->get('app_pekerjaan');
				return $query->row()->keterangan;
			}
			function getNameSatuProdi($data){
				$this->db->where('id_prodi', $data);
				$query = $this->db->get('akademik_prodi');
				return $query->row()->nama_prodi;
			}
			function getNameSatuAngkatan($data){
				$this->db->where('id_angkatan', $data);
				$query = $this->db->get('akademik_angkatan');
				return $query->row()->tahun;
			}
			function getNameSatuKelas($data){
				$this->db->where('id_kelas', $data);
				$query = $this->db->get('akademik_kelas');
				return $query->row()->nama_kelas;
			}
			function getNameSatuAgama($data){
				$this->db->where('agama_id', $data);
				$query = $this->db->get('app_agama');
				return $query->row()->keterangan;
			}


			function addNewFile($data){
				$file_name = $_FILES['userfile']['name'];
				$file_name = str_replace(' ','_',$file_name);

				$simpan_data=array(
					'judul'  		=> $data['judul'],
					'filename' 	=> $file_name,
					'owner' 		=> $this->session->kode_user,
					'dir'				=> $this->session->level.'/'.$this->session->kode_user.'/'.$file_name
				);

				$simpan  = $this->db->insert('uploaded_file', $simpan_data);
				return $simpan;
			}
			function input_PembayaranByMhs($data){
				$getTagihan = $this->db->get_where('keuangan_biaya', array('id_tahun_akademik' => $data['id_tahun_akademik'], 'bulan' => $data['bulan']));

				$this->db->where('id_tahun_akademik',$data['id_tahun_akademik']);
				$this->db->where('nim',$this->session->kode_user);
				$this->db->where('id_biaya',$getTagihan->row()->id_biaya);
				$result = $this->db->get('keuangan_transaksi');

				if($result->num_rows() > 0){
					return 0;
				} else{
					$getBukti = $this->db->get_where('uploaded_file',array('judul'=>$data['judul']));
					$getTagihan = $this->db->get_where('keuangan_biaya', array('id_tahun_akademik' => $data['id_tahun_akademik'],'jenis_pembayaran'=>$data['j_bayar'] ,'bulan' => $data['bulan']));

					if ($getTagihan->num_rows()>0) {
						$new_member_insert_data = array(
							'id_tahun_akademik' => $data['id_tahun_akademik'],
							'id_biaya' => $getTagihan->row()->id_biaya,
							'nim' => $this->session->kode_user,
							'status_pembayaran_mhs' => 3,
							'tanggal' => $data['tanggal'],
							'buktipembayaran' => $getBukti->row()->id_bukti
						);
						$insert = $this->db->insert('keuangan_transaksi', $new_member_insert_data);
						return $insert;
					}
					else{
						return 0;
					}
				}
		  }
			function getBuktiBayar($id_bukti){
				$query = $this->db->get_where('uploaded_file', array('id_bukti'=>$id_bukti));
				return $query;
			}
			function addNewFileMateri($data){
			  $file_name = $_FILES['userfile']['name'];
			  $file_name = str_replace(' ','_',$file_name);

			  $simpan_data=array(
			    'judul'  		=> $data['judul'],
			    'filename' 	=> $file_name,
			    'owner' 		=> $this->session->kode_user,
			    'dir'				=> $this->session->level.'/'.$this->session->kode_user.'/'.$data['id_jadwal_master'].'/Materi/'.$file_name
			  );

			  $simpan  = $this->db->insert('uploaded_file', $simpan_data);
			  return $simpan;
			}
			function addNewMateri($data){
			  $file_name = $_FILES['userfile']['name'];
			  $file_name = str_replace(' ','_',$file_name);

			  $getBukti = $this->db->get_where('uploaded_file',array('dir'=> $this->session->level.'/'.$this->session->kode_user.'/'.$data['id_jadwal_master'].'/Materi/'.$file_name));

			  $new_member_insert_data = array(
			  'id_jadwal_master' => $data['id_jadwal_master'],
			  'judul_materi' => $data['judul'],
			  'id_file' => $getBukti->row()->id_bukti
			  );
			  $insert = $this->db->insert('akademik_materi', $new_member_insert_data);
			  return $insert;
			}
			function getMateri($id_jadwal_master){
			  $result = $this->db
			  ->select('akademik_materi.*,akademik_jadwal_master.*,uploaded_file.*')
			  ->join('akademik_jadwal_master','akademik_materi.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			  ->join('uploaded_file','akademik_materi.id_file = uploaded_file.id_bukti')
			  ->where('akademik_materi.id_jadwal_master',$id_jadwal_master)
			  ->get('akademik_materi');
			  return $result;

			}
			function addNewFileTugas($data){
			  $file_name = $_FILES['userfile']['name'];
			  $file_name = str_replace(' ','_',$file_name);

			  $simpan_data=array(
			    'judul'  		=> $data['judul'],
			    'filename' 	=> $file_name,
			    'owner' 		=> $this->session->kode_user,
			    'dir'				=> $this->session->level.'/'.$this->session->kode_user.'/'.$data['id_jadwal_master'].'/Tugas/'.$file_name
			  );

			  $simpan  = $this->db->insert('uploaded_file', $simpan_data);
			  return $simpan;
			}
			function addNewTugas($data){
			  $file_name = $_FILES['userfile']['name'];
			  $file_name = str_replace(' ','_',$file_name);

			  $getBukti = $this->db->get_where('uploaded_file',array('dir'=> $this->session->level.'/'.$this->session->kode_user.'/'.$data['id_jadwal_master'].'/Tugas/'.$file_name));

			  $new_member_insert_data = array(
			  'id_jadwal_master' => $data['id_jadwal_master'],
			  'judul_tugas' => $data['judul'],
			  'id_file' => $getBukti->row()->id_bukti,
				'batas_upload' => $data['bts_upload']
			  );
			  $insert = $this->db->insert('akademik_tugas', $new_member_insert_data);
			  return $insert;
			}
			function getJumHasilTugasByNim($id_tugas,$nim){
				$result = $this->db->get_where('tugas_mhs',array('id_tugas' => $id_tugas,'nim'=>$nim));
				return $result->num_rows();
			}
			function getAllTugas($nim){
				$jumAllTugas = 0;
				$result = $this->db
				->select('akademik_tugas.*,akademik_krs.*')
				->join('akademik_krs','akademik_tugas.id_jadwal_master = akademik_krs.id_jadwal_master')
				->where('akademik_krs.nim',$nim)
				->get('akademik_tugas');
				if ($result->num_rows()>0) {
					$jumAllTugas = $result->num_rows();
					foreach ($result->result() as $data) {
						$jumAllTugas = $jumAllTugas-$this->getJumHasilTugasByNim($data->id_tugas,$nim);
					}
				}
				return $jumAllTugas;
			}
			function getAllMateri($nim){
				$result = $this->db
				->select('akademik_materi.*,akademik_krs.*')
				->join('akademik_krs','akademik_materi.id_jadwal_master = akademik_krs.id_jadwal_master')
				->where('akademik_krs.nim',$nim)
				->get('akademik_materi');
				return $result->num_rows();
			}
			function getTugas($id_jadwal_master){
			  $result = $this->db
			  ->select('akademik_tugas.*,akademik_jadwal_master.*,uploaded_file.*')
			  ->join('akademik_jadwal_master','akademik_tugas.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
			  ->join('uploaded_file','akademik_tugas.id_file = uploaded_file.id_bukti')
			  ->where('akademik_tugas.id_jadwal_master',$id_jadwal_master)
			  ->get('akademik_tugas');
			  return $result;
			}
			function addNewFileHasilTugas($data){
			  $file_name = $_FILES['userfile']['name'];
			  $file_name = str_replace(' ','_',$file_name);

			  $simpan_data=array(
			    'judul'  		=> 'TGS_'.$this->session->kode_user.'_'.$data['judul'],
			    'filename' 	=> $file_name,
			    'owner' 		=> $this->session->kode_user,
			    'dir'				=> $this->session->level.'/'.$this->session->kode_user.'/'.$data['id_jadwal_master'].'/Tugas/'.$file_name
			  );

			  $simpan  = $this->db->insert('uploaded_file', $simpan_data);
			  return $simpan;
			}
			function addNewHasilTugas($data){
			  $file_name = $_FILES['userfile']['name'];
			  $file_name = str_replace(' ','_',$file_name);

			  $getBukti = $this->db->get_where('uploaded_file',array('dir'=> $this->session->level.'/'.$this->session->kode_user.'/'.$data['id_jadwal_master'].'/Tugas/'.$file_name));

			  $new_member_insert_data = array(
			  'id_tugas' => $data['judul'],
			  'nim' => $this->session->kode_user,
			  'id_file' => $getBukti->row()->id_bukti,
				'uploaded_time' => $data['upload_time']
			  );
			  $insert = $this->db->insert('tugas_mhs', $new_member_insert_data);
			  return $insert;
			}
			function getHasilTugas($id_tugas){
			  $result = $this->db
			  ->select('akademik_tugas.*,tugas_mhs.*,uploaded_file.*,tbl_mahasiswa.*,akademik_kelas.*')
			  ->join('akademik_tugas','tugas_mhs.id_tugas = akademik_tugas.id_tugas')
			  ->join('uploaded_file','tugas_mhs.id_file = uploaded_file.id_bukti')
			  ->join('tbl_mahasiswa','tugas_mhs.nim = tbl_mahasiswa.nim')
			  ->join('akademik_kelas','tbl_mahasiswa.id_kelas = akademik_kelas.id_kelas')
			  ->where('tugas_mhs.id_tugas',$id_tugas)
			  ->get('tugas_mhs');
			  return $result;
			}
			public function getStatusTugas($id){
			  $this->db->where('id_tugas',$id);
			  $this->db->where('nim',$this->session->kode_user);
			  $query = $this->db->get('tugas_mhs');

			  if ($query->num_rows() > 0) {
			    $status = '1';
			  }else{
			    $status = '2';
			  }
			  return $status;
			}
			public function getMhsByDosen(){
				$thn = $this->getOpenTahunAkademik();

				$result = $this->db
				->select('akademik_krs.*,akademik_jadwal_master.*')
				->join('akademik_jadwal_master','akademik_krs.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
				->where('akademik_jadwal_master.nidn',$this->session->kode_user)
				->where('akademik_jadwal_master.id_tahun_akademik',$thn)
				->get('akademik_krs');
				return $result;
			}
			public function getJdwlByDosen(){
				$thn = $this->getOpenTahunAkademik();

				$result = $this->db
				->select('akademik_jadwal_matkul.*,akademik_jadwal_master.*')
				->join('akademik_jadwal_master','akademik_jadwal_matkul.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
				->where('akademik_jadwal_master.nidn',$this->session->kode_user)
				->where('akademik_jadwal_master.id_tahun_akademik',$thn)
				->get('akademik_jadwal_matkul');
				return $result;
			}
			public function getJdwlByMHS(){
				$thn = $this->getOpenTahunAkademik();

				$result = $this->db
				->select('akademik_jadwal_matkul.*,akademik_jadwal_master.*,akademik_krs.*')
				->join('akademik_jadwal_master','akademik_jadwal_matkul.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
				->join('akademik_krs','akademik_jadwal_matkul.id_jadwal_master = akademik_krs.id_jadwal_master')
				->where('akademik_krs.nim',$this->session->kode_user)
				->where('akademik_jadwal_master.id_tahun_akademik',$thn)
				->get('akademik_jadwal_matkul');
				return $result;
			}
			public function getJumlahSKSMHS(){
				$result = $this->db
				->select('akademik_nilai.*,akademik_jadwal_master.*,akademik_matkul.*')
				->join('akademik_jadwal_master','akademik_nilai.id_jadwal_master = akademik_jadwal_master.id_jadwal_master')
				->join('akademik_matkul','akademik_jadwal_master.kode_mk = akademik_matkul.kode_mk')
				->where('akademik_nilai.nim',$this->session->kode_user)
				->get('akademik_nilai');

				$jum = 0;
				foreach($result->result() as $data):
					$hh = $data->sks_mk;
					$jum = $jum + $hh;
				endforeach;
				return $jum;
			}
			function updatePass($data){
			if ($this->session->level != 1) {
				$result =$this->db->get_where('tbl_users',array('username'=>$this->session->kode_user));
				if ($result->num_rows()>0) {
					if ((md5($data['pwd_old'])) == (($result->row()->password))) {
						if ((($data['pwd_new1']) == ($data['pwd_new2'])) && (($data['pwd_new1']) != (''))) {
							$update_data = array(
								'password' => md5($data['pwd_new1'])
							);
							$this->db->where('username',$this->session->kode_user);
							$update = $this->db->update('tbl_users',$update_data);
							return $update;
						}else{
							return 0;
						}
					}else{
						return 0;
					}
				}else{
					return 0;
				}
			}
		}
		function resetPass($data){
			if ($this->session->level==1) {
				$result = $this->db->get_where('tbl_users',array('username' => $data));
				if ($result->num_rows() > 0) {
					if ($result->row()->level == 3) {
						$update_data = array(
							'password' => md5('pwd'.$data)
						);
					}else{
						$update_data = array(
							'password' => md5($data)
						);
					}

					$this->db->where('username',$data);
					$update = $this->db->update('tbl_users',$update_data);
					return $update;
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
		function addNewEvent($data){
			if ($this->session->level==1) {
				$insert_data = array(
					'id_tahun_akademik' => $data['tahun_akademik'],
					'nama_kegiatan' => $data['nama_kegiatan'],
					'tanggal_mulai' => $data['tgl_mulai'],
					'tanggal_selesai' => $data['tgl_selesai'],
					'level' => $data['level']
				);
				$insert = $this->db->insert('akademik_kegiatan',$insert_data);
				return $insert;
			}else{
				return 0;
			}
		}
		function getAllEvent(){
			$result = $this->db
			->select('akademik_kegiatan.*,akademik_tahun_akademik.*')
			->join('akademik_tahun_akademik','akademik_kegiatan.id_tahun_akademik = akademik_tahun_akademik.tahun_akademik_id')
			->get('akademik_kegiatan');
			return $result;
		}
		function eventDelete($id){
			$this->db->where('id_kegiatan',$id);
			$query = $this->db->delete('akademik_kegiatan');
			return $query;
		}
		function materiDelete($id){
			$this->db->where('id_materi',$id);
			$query = $this->db->delete('akademik_materi');
			return $query;
		}
		function hasilTugasDelete($id){
			$this->db->where('id_tugas',$id);
			$query = $this->db->delete('tugas_mhs');
			return $query;
		}
		function tugasDelete($id){
			$getUploadedTugas = $this->db->get_where('tugas_mhs',array('id_tugas' => $id));
			if ($getUploadedTugas->num_rows()>0) {
				foreach ($getUploadedTugas->result() as $data) {
					$query = $this->hasilTugasDelete($data->id_tugas);
					if (!$query) {
						return 0;
					}
				}
				$this->db->where('id_tugas',$id);
				$query = $this->db->delete('akademik_tugas');
				return $query;
			}else{
				$this->db->where('id_tugas',$id);
				$query = $this->db->delete('akademik_tugas');
				return $query;
			}
		}
		function addNewFileFotoProfil($data){
			$file_name = $_FILES['userfile']['name'];
			$file_name = str_replace(' ','_',$file_name);

			$simpan_data=array(
				'judul'  		=> 'DP_'.$this->session->kode_user,
				'filename' 	=> $file_name,
				'owner' 		=> $this->session->kode_user,
				'dir'				=> $this->session->level.'/'.$this->session->kode_user.'/DP/'.$file_name
			);

			$simpan  = $this->db->insert('uploaded_file', $simpan_data);

			return $simpan;
		}
		function editFotoProfil($data){
			$file_name = $_FILES['userfile']['name'];
			$file_name = str_replace(' ','_',$file_name);

			$getFoto = $this->db->get_where('uploaded_file',array('dir'=> $this->session->level.'/'.$this->session->kode_user.'/DP/'.$file_name));

			$new_member_insert_data = array(
				'foto_profil' => $getFoto->row()->id_bukti
			);
			if ($this->session->level == 3) {
				$this->db->where('nim', $this->session->kode_user);
				$insert = $this->db->update('tbl_mahasiswa', $new_member_insert_data);
			}else if ($this->session->level == 2){
				$this->db->where('nidn', $this->session->kode_user);
				$insert = $this->db->update('tbl_dosen', $new_member_insert_data);
			}

		}
		function getFotoProfilMhs(){
			$mhs = $this->db->get_where('tbl_mahasiswa',array('nim'=>$this->session->kode_user));
			$getFoto = $this->db->get_where('uploaded_file', array('id_bukti' => $mhs->row()->foto_profil));
			if ($getFoto->num_rows()>0) {
				return $getFoto->row()->dir;
			}else{
				return 0;
			}
		}
		function getFotoProfilDsn(){
			$mhs = $this->db->get_where('tbl_dosen',array('nidn'=>$this->session->kode_user));
			$getFoto = $this->db->get_where('uploaded_file', array('id_bukti' => $mhs->row()->foto_profil));
			if ($getFoto->num_rows()>0) {
				return $getFoto->row()->dir;
			}else{
				return 0;
			}

		}
	}

?>
