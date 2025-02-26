<?php

    /**
     * Model database for ModelBanner tables
     * 
     * @package OSClass
     * @subpackage Model
     * @since 3.0
     */
    class ModelBanner extends DAO
    {
        /**
         * It references to self object: ModelBanner.
         * It is used as a singleton
         * 
         * @access private
         * @since 3.0
         * @var Currency
         */
        private static $instance ;

        /**
         * It creates a new ModelBanner object class ir if it has been created
         * before, it return the previous object
         * 
         * @access public
         * @since 3.0
         * @return Currency
         */
        public static function newInstance()
        {
            if( !self::$instance instanceof self ) {
                self::$instance = new self ;
            }
            return self::$instance ;
        }

        /**
         * Construct
         */
        function __construct()
        {
            parent::__construct();
        }
        
        /**
         * Return table name Feature Banner
         * @return string
         */
        public function getTable_FeatureBanner()
        {
            return DB_TABLE_PREFIX.'t_feature_banner';
        }
        
         /**
         * Return banner upload path
         * @return string
         */
        public function getbanner_uploadpath()
        {
            return osc_content_path().'uploads/banner_uploads/';
        }
        
         /**
         * Return banner upload URL
         * @return string
         */
        public function getbanner_uploadURL()
        {
            return osc_base_url().'oc-content/uploads/banner_uploads/';
        }
        
        
        
        /**
         * Import sql file
         * @param type $file 
         */
        public function import($file)
        {
			$results = $this->dao->query(sprintf('SELECT count(*) as banner_count FROM %s ', $this->getTable_FeatureBanner()));
			if(!$results)
			{
				$this->create_uplaoddir();
				
				$path = osc_themes_path().$file ;
				$sql = file_get_contents($path);

				if(! $this->dao->importSQL($sql) ){
					throw new Exception( $this->dao->getErrorLevel().' - '.$this->dao->getErrorDesc() ) ;
				}
			}
        }
        
        /**
         * create directry for banner uploads
         */
        public function create_uplaoddir()
        {
			if (!is_dir($this->getbanner_uploadpath())) { 
				umask(0000);
				mkdir($this->getbanner_uploadpath(), 0755);
			}
		}
        
        /**
         * Remove data and tables related to the plugin.
         */
        public function uninstall()
        {
			if (is_dir($this->getbanner_uploadpath())) { 
				$dir = $this->getbanner_uploadpath() ;
				$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
				$files = new RecursiveIteratorIterator($it,
							 RecursiveIteratorIterator::CHILD_FIRST);
				foreach($files as $file) {
					if ($file->getFilename() === '.' || $file->getFilename() === '..') {
						continue;
					}
					if ($file->isDir()){
						rmdir($file->getRealPath());
					} else {
						unlink($file->getRealPath());
					}
				}
				rmdir($dir);
			}
            $this->dao->query(sprintf('DROP TABLE %s', $this->getTable_FeatureBanner()) ) ;
        }
        
        /**
         * Insert a feature banner 
         *
         * @param string $bannerpath
         * @param string $bannername 
         */
        public function insertFeatureBanner( $bannerpath, $bannername,$bannerlink)
        {
            $aSet = array(
                's_path'  => $bannerpath,
                's_name'  => $bannername,
                's_link'  => $bannerlink
            );
            return $this->dao->insert( $this->getTable_FeatureBanner(), $aSet) ; 
        }
        
        /**
         * Replace a feature banner 
         *
         * @param int 	 $id
         * @param string $bannerpath
         * @param string $bannername 
         */
        public function replaceFeatureBanner($id,$bannerpath, $bannername, $bannerlink)
        {
			$results = $this->dao->query(sprintf('SELECT s_path FROM %s WHERE i_banner_id = %d', $this->getTable_FeatureBanner(), $id));
            $data = $results->row() ;
            if($bannerpath!=$data['s_path']){ 
				unlink($this->getbanner_uploadpath().$data['s_path']);
			}
            $aSet = array(
                'i_banner_id'  	=> $id,
                's_name'  		=> $bannername,
                's_path'  		=> $bannerpath,
                's_link'  		=> $bannerlink
            );
            return $this->dao->replace( $this->getTable_FeatureBanner(), $aSet) ;
        }
        
        /**
         * Delete a feature banner given a banner id
         * @param int $id 
         */
        public function deleteFeatureBanner($id)
        {
			$results = $this->dao->query(sprintf('SELECT s_path FROM %s WHERE i_banner_id = %d', $this->getTable_FeatureBanner(), $id));
            $data = $results->row() ;  
			unlink($this->getbanner_uploadpath().$data['s_path']);
            return $this->dao->query( sprintf('DELETE FROM %s WHERE i_banner_id = %d', $this->getTable_FeatureBanner(), $id) ) ;
        }
        
        /**
         * Get banner list array
         * 
         * @return array formated array
         */
        public function getBannerListArray()
        {
            $banner = array();
            $results = $this->dao->query(sprintf('SELECT * FROM %s ', $this->getTable_FeatureBanner()));
            $data = $results->result() ;            
            return $data;
        }
        
        /**
         * Get banner file name
         * 
         * @param int $id 
         * @return array formated array
         */
        public function getBannerfilename($id)
        {
            $banner = array();
            $results = $this->dao->query(sprintf('SELECT s_path FROM %s WHERE i_banner_id = %d', $this->getTable_FeatureBanner(), $id));
            $data = $results->row() ;            
            return $data;
        }
        
        /**
         * Get banner row
         * 
         * @param int $id 
         * @return array formated array
         */
        public function getBannerRow($id)
        {
            $banner = array();
            $results = $this->dao->query(sprintf('SELECT * FROM %s WHERE i_banner_id = %d', $this->getTable_FeatureBanner(), $id));
            $data = $results->row() ;            
            return $data;
        }
        
        /**
         * Get number of inserted banners
         * 
         * 
         * @return array formated array
         */
        public function getBannerCount()
        {
            $banner = array();
            $results = $this->dao->query(sprintf('SELECT count(*) as banner_count FROM %s ', $this->getTable_FeatureBanner()));
            $data = $results->result();            
            return $data;
        }
    }

?>
