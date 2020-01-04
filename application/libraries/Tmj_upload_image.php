<?php
/**
 * 上传图片处理类
 * 主要调用save方法，用于保存图片到指定文件夹，并生成其它指定大小缩略图。
 *
 * 依赖配置项：
 *  upload_image_save_path:图片保存路径
 *  upload_image_thumb_size:缩略图大小
 *  upload_image_quality:图片压缩质量
 *
 * @date 2015-09-17
 *
 * 用法演示：
 *  $this->load->library('tmj_upload_image');
 *  $this->tmj_upload_image -> save('goods', $filepath, array('300x300', '100x300', '300x100', '300x0', '0x300'));
 */
class Tmj_upload_image {
	protected $save_dir;
	protected $quality = 95;
	protected $types = array('jpg', 'jpeg', 'png', 'bmp','qr_code');
	protected $thumb_sizes;
	
	/**
	 * 错误原因
	 */
	public $error = NULL;
	function __construct() {
		$CI = &get_instance ();
	}
	
	/**
	 * 获取保存的物理文件夹路径
	 */
	protected function _get_save_path($type) {
		if (! in_array ( $type, $this->types )) {
			$this->error = array (
					'code' => 'UNKNOWN_SAVE_TYPE',
					'data' => '尚未配置此上传图片类型。' 
			);
			return FALSE;
		}
		
		$save_dir = IMG_UPLOAD_DIR  . 'other/'. date ( 'Y' ).date('/md');
		is_dir ( $save_dir ) or mkdir ( $save_dir, 0775, TRUE );
		return $save_dir;
	}
	
	/**
	 * 保存原图（跟save的区别是不转变为jpg，不生成缩略图）
	 *
	 * @return 成功返回原图图片相对地址，失败则返回false
	 */
	public function save_original($type, $file_path) {
		
		if (! is_file ( $file_path )) {
			$this->error = array (
					'code' => 'FILE_NOT_FOUND',
					'data' => '无法读取图片来源！' 
			);
			
			return FALSE;
		}
		
		// 验证图片格式
		$file_info = getimagesize ( $file_path );
		$file_type = $file_info [2];
		$file_ext = '';
		if ($file_type === IMAGETYPE_JPEG) {
			$file_ext = '.jpg';
		} else if ($file_type === IMAGETYPE_PNG) {
			$file_ext = '.png';
		} else if ($file_type === IMAGETYPE_GIF) {
			$file_ext = '.gif';
		} else if ($file_type === IMAGETYPE_BMP) {
			$file_ext = '.bmp';
		} else {
			$this->error = array (
					'code' => 'UNKNOWN_FILE_TYPE',
					'data' => '不支持的上传图片类型。' 
			);
			
			return FALSE;
		}
		
		// 初始化保存文件夹
		$save_dir = $this->_get_save_path ( $type );
		
		if (! $save_dir) {
			return FALSE;
		}
		
		// 原图保存的完整路径
		//$user = get_user ();
		$filename_rand = '';
		$filename_rand .= str_pad ( mt_rand ( 0, 9999999999 ), 10, '0', STR_PAD_LEFT );
		
		$original_path = $save_dir . date ( '/His' ) . $filename_rand . '.jpg';
		copy ( $file_path, $original_path );
		//unlink($file_path);
		return substr ( $original_path, strlen ( IMG_UPLOAD_DIR ) -1 );
	}
	
	/**
	 * 保存文件到图片服务器
	 * 目前支持的文件格式：jpg/jpeg/png/gif/bmp
	 * 提示：BMP转换速度慢，需避免使用
	 *
	 * @param $type 图片类型（仅限使用配置文件项）        	
	 * @param $file_path 原始图片完整路径
	 *        	- 上传时，直接传入 $file['tmp_name']
	 * @param $thumb_sizes 要生成的文件大小数组，默认为null，表示根据类型读取配置，若禁止生成缩略图，则使用FALSE
	 *        	示例为：array(60, '80x80', '160x160', '200x0', '0x200'...)
	 *        	60表示60x60
	 *        	0表示不限定，例如200x0，表示只限宽度
	 *        	
	 * @return 成功返回原图图片相对地址，失败则返回false 已知错误原因：
	 *         UNKNOWN_TYPE:未知的上传请求类型
	 *         UNKNOWN_FILE_TYPE:不支持的上传图片类型
	 *         ERROR_THUMB_SIZE:不支持的上传图片类型
	 *        
	 */
	public function save($type, $file_path, $thumb_sizes = NULL) {
		if (! is_file ( $file_path )) {
			$this->error = array (
					'code' => 'FILE_NOT_FOUND',
					'data' => '无法读取图片来源！' 
			);
			return FALSE;
		}
		
		// 初始化保存文件夹
		$save_dir = $this->_get_save_path ( $type );
		if (! $save_dir) {
			return FALSE;
		}
		
		// 原图保存的完整路径
		//$user = get_user ();
		$filename_rand = '';
		$filename_rand .= str_pad ( mt_rand ( 0, 9999 ), 4, '0', STR_PAD_LEFT );
		$original_path = $save_dir . date ( '/His' ) . $filename_rand . '.jpg';
		// 保存/转换，确定得到原图
		$file_info = getimagesize ( $file_path );
		$file_type = $file_info [2];
		if ($file_type === IMAGETYPE_JPEG) {
			copy ( $file_path, $original_path );
		} else if ($file_type === IMAGETYPE_PNG) {
			$input = imagecreatefrompng ( $file_path );
			list ( $width, $height ) = getimagesize ( $file_path );
			$output = imagecreatetruecolor ( $width, $height );
			$white = imagecolorallocate ( $output, 255, 255, 255 );
			imagefilledrectangle ( $output, 0, 0, $width, $height, $white );
			imagecopy ( $output, $input, 0, 0, 0, 0, $width, $height );
			imagejpeg ( $output, $original_path, $this->quality );
			imagedestroy ( $input );
			imagedestroy ( $output );
		} else if ($file_type === IMAGETYPE_GIF) {
			$input = imagecreatefromgif ( $file_path );
			list ( $width, $height ) = getimagesize ( $file_path );
			$output = imagecreatetruecolor ( $width, $height );
			$white = imagecolorallocate ( $output, 255, 255, 255 );
			imagefilledrectangle ( $output, 0, 0, $width, $height, $white );
			imagecopy ( $output, $input, 0, 0, 0, 0, $width, $height );
			imagejpeg ( $output, $original_path, $this->quality );
			imagedestroy ( $input );
			imagedestroy ( $output );
		} else if ($file_type === IMAGETYPE_BMP) {
			$input = $this->_imagecreatefrombmp ( $file_path );
			if (! $input) {
				return FALSE;
			}
			list ( $width, $height ) = getimagesize ( $file_path );
			$output = imagecreatetruecolor ( $width, $height );
			$white = imagecolorallocate ( $output, 255, 255, 255 );
			imagefilledrectangle ( $output, 0, 0, $width, $height, $white );
			imagecopy ( $output, $input, 0, 0, 0, 0, $width, $height );
			imagejpeg ( $output, $original_path, $this->quality );
			imagedestroy ( $input );
			imagedestroy ( $output );
		} else {
			$this->error = array (
					'code' => 'UNKNOWN_FILE_TYPE',
					'data' => '不支持的上传图片类型。' 
			);
			return FALSE;
		}
		
		// 生成缩略图
		if ($thumb_sizes === NULL) {
			// 读取配置的默认缩略图
			$thumb_sizes = $this->get_thumb_sizes ( $type );
		}
		if ($thumb_sizes) {
			if (! $this->thumb ( $original_path, $thumb_sizes )) {
				// 生成失败，删除原图
				$this->delete ( $original_path );
				return FALSE;
			}
		}
		
		return substr ( $original_path, strlen ( $this->save_dir ) );
	}
	
	/**
	 * 通过类型，获取配置的缩略图大小
	 */
	public function get_thumb_sizes($type) {
		return isset ( $this->thumb_sizes [$type] ) ? $this->thumb_sizes [$type] : NULL;
	}
	
	/**
	 * 生成缩略图（目前仅限jpg文件）
	 *
	 * @param string $file_path
	 *        	原始图片的完整物理路径
	 * @param array $thumb_sizes
	 *        	要生成的文件大小数组
	 *        	示例为：array(60, '80x80', '160x160', '200x0', '0x200'...)
	 *        	60表示60x60
	 *        	0表示不限定，例如200x0，表示只限宽度
	 *        	
	 * @return array() 缩略图地址，失败则返回false
	 */
	public function thumb($file_path, $thumb_sizes) {
		if (! is_file ( $file_path )) {
			$this->error = array (
					'code' => 'FILE_NOT_FOUND',
					'data' => '无法读取图片来源！' 
			);
			return FALSE;
		}
		
		// 判断文件类型
		$file_info = getimagesize ( $file_path );
		$file_type = $file_info [2];
		if ($file_type !== IMAGETYPE_JPEG) {
			$this->error = array (
					'code' => 'ONLY_JPG',
					'data' => '目前仅支持JPG文件格式。' 
			);
			return FALSE;
		}
		
		$ret = array ();
		
		// 生成缩略图
		if ($thumb_sizes) {
			// 生成缩略图存放文件夹
			$thumb_folder = dirname ( $this->save_dir . 'thumb/' . substr ( $file_path, strlen ( $this->save_dir ) ) );
			file_exists ( $thumb_folder ) or mkdir ( $thumb_folder, 0775, TRUE );
			
			$original_path = $file_path;
			$input = imagecreatefromjpeg ( $original_path );
			list ( $original_width, $original_height ) = getimagesize ( $original_path );
			foreach ( $thumb_sizes as $size ) {
				if (is_numeric ( $size )) {
					$size = $size . 'x' . $size;
				}
				
				if (! preg_match ( '/^(\d+)x(\d+)$/', $size, $match )) {
					$this->error = array (
							'code' => 'ERROR_THUMB_SIZE',
							'data' => '错误的缩略图大小。' 
					);
					return FALSE;
				}
				
				$width = intval ( $match [1] );
				$height = intval ( $match [2] );
				if ($width + $height < 1) {
					$this->error = array (
							'code' => 'ERROR_THUMB_SIZE',
							'data' => '错误的缩略图大小。' 
					);
					return FALSE;
				}
				
				// 计算按比例缩小的图片尺寸
				$target_width = $target_height = 0;
				if ($width > 0 && $height > 0) {
					$target_width = $width;
					$target_height = $target_width * $original_height / $original_width;
					if ($target_height > $height) {
						$target_height = $height;
						$target_width = $target_height * $original_width / $original_height;
					}
				} else if ($height === 0) {
					// 只限宽度
					$target_width = $width;
					$target_height = $target_width * $original_height / $original_width;
				} else {
					// 只限高度
					$target_height = $height;
					$target_width = $target_height * $original_width / $original_height;
				}
				
				$save_path = $thumb_folder . '/' . basename ( $original_path ) . '_' . $width . 'x' . $height . '.jpg';
				
				$output = imagecreatetruecolor ( $target_width, $target_height );
				imagecopyresampled ( $output, $input, 0, 0, 0, 0, $target_width, $target_height, $original_width, $original_height );
				imagejpeg ( $output, $save_path, $this->quality );
				imagedestroy ( $output );
				
				$ret [] = substr ( $save_path, strlen ( $this->save_dir . 'thumb/' ) );
			}
			imagedestroy ( $input );
		} else {
			$this->error = array (
					'code' => 'ERROR_THUMB_SIZE',
					'data' => '错误的缩略图大小。' 
			);
			return FALSE;
		}
		
		return $ret;
	}
	
	/**
	 * 删除图片及其所有缩略图
	 *
	 * @param
	 *        	file 原图完整路径或相对根目录的路径
	 */
	public function delete($file) {
		if (empty ( $file )) {
			return;
		}
		
		if (strpos ( $file, $this->save_dir ) !== 0) {
			$file = $this->save_dir . $file;
		}
		
		/*
		 * // 计算缩略图路径 $thumb_folder = dirname ( $this->save_dir . 'thumb/' . substr ( $file, strlen ( $this->save_dir ) ) ) . '/'; foreach ( glob ( $thumb_folder . '*' ) as $filename ) { unlink ( $filename ); }
		 */
		
		// 删除原图
		file_exists ( $file ) && unlink ( $file );
		
		return TRUE;
	}
	protected function _imagecreatefrombmp($filename) {
		// version 1.00
		if (! ($fh = fopen ( $filename, 'rb' ))) {
			trigger_error ( 'imagecreatefrombmp: Can not open ' . $filename, E_USER_WARNING );
			return false;
		}
		// read file header
		$meta = unpack ( 'vtype/Vfilesize/Vreserved/Voffset', fread ( $fh, 14 ) );
		// check for bitmap
		if ($meta ['type'] != 19778) {
			trigger_error ( 'imagecreatefrombmp: ' . $filename . ' is not a bitmap!', E_USER_WARNING );
			return false;
		}
		// read image header
		$meta += unpack ( 'Vheadersize/Vwidth/Vheight/vplanes/vbits/Vcompression/Vimagesize/Vxres/Vyres/Vcolors/Vimportant', fread ( $fh, 40 ) );
		// read additional 16bit header
		if ($meta ['bits'] == 16) {
			$meta += unpack ( 'VrMask/VgMask/VbMask', fread ( $fh, 12 ) );
		}
		// set bytes and padding
		$meta ['bytes'] = $meta ['bits'] / 8;
		$meta ['decal'] = 4 - (4 * (($meta ['width'] * $meta ['bytes'] / 4) - floor ( $meta ['width'] * $meta ['bytes'] / 4 )));
		if ($meta ['decal'] == 4) {
			$meta ['decal'] = 0;
		}
		// obtain imagesize
		if ($meta ['imagesize'] < 1) {
			$meta ['imagesize'] = $meta ['filesize'] - $meta ['offset'];
			// in rare cases filesize is equal to offset so we need to read physical size
			if ($meta ['imagesize'] < 1) {
				$meta ['imagesize'] = @filesize ( $filename ) - $meta ['offset'];
				if ($meta ['imagesize'] < 1) {
					trigger_error ( 'imagecreatefrombmp: Can not obtain filesize of ' . $filename . '!', E_USER_WARNING );
					return false;
				}
			}
		}
		// calculate colors
		$meta ['colors'] = ! $meta ['colors'] ? pow ( 2, $meta ['bits'] ) : $meta ['colors'];
		// read color palette
		$palette = array ();
		if ($meta ['bits'] < 16) {
			$palette = unpack ( 'l' . $meta ['colors'], fread ( $fh, $meta ['colors'] * 4 ) );
			// in rare cases the color value is signed
			if ($palette [1] < 0) {
				foreach ( $palette as $i => $color ) {
					$palette [$i] = $color + 16777216;
				}
			}
		}
		// create gd image
		$im = imagecreatetruecolor ( $meta ['width'], $meta ['height'] );
		if (! $im) {
			$this->error = array (
					'code' => 'ERROR_CREATE_BMP',
					'data' => '转换BMP上传图片失败。' 
			);
			return FALSE;
		}
		
		$data = fread ( $fh, $meta ['imagesize'] );
		$p = 0;
		$vide = chr ( 0 );
		$y = $meta ['height'] - 1;
		$error = 'imagecreatefrombmp: ' . $filename . ' has not enough data!';
		// loop through the image data beginning with the lower left corner
		while ( $y >= 0 ) {
			$x = 0;
			while ( $x < $meta ['width'] ) {
				switch ($meta ['bits']) {
					case 32 :
					case 24 :
						if (! ($part = substr ( $data, $p, 3 ))) {
							trigger_error ( $error, E_USER_WARNING );
							return $im;
						}
						$color = unpack ( 'V', $part . $vide );
						break;
					case 16 :
						if (! ($part = substr ( $data, $p, 2 ))) {
							trigger_error ( $error, E_USER_WARNING );
							return $im;
						}
						$color = unpack ( 'v', $part );
						$color [1] = (($color [1] & 0xf800) >> 8) * 65536 + (($color [1] & 0x07e0) >> 3) * 256 + (($color [1] & 0x001f) << 3);
						break;
					case 8 :
						$color = unpack ( 'n', $vide . substr ( $data, $p, 1 ) );
						$color [1] = $palette [$color [1] + 1];
						break;
					case 4 :
						$color = unpack ( 'n', $vide . substr ( $data, floor ( $p ), 1 ) );
						$color [1] = ($p * 2) % 2 == 0 ? $color [1] >> 4 : $color [1] & 0x0F;
						$color [1] = $palette [$color [1] + 1];
						break;
					case 1 :
						$color = unpack ( 'n', $vide . substr ( $data, floor ( $p ), 1 ) );
						switch (($p * 8) % 8) {
							case 0 :
								$color [1] = $color [1] >> 7;
								break;
							case 1 :
								$color [1] = ($color [1] & 0x40) >> 6;
								break;
							case 2 :
								$color [1] = ($color [1] & 0x20) >> 5;
								break;
							case 3 :
								$color [1] = ($color [1] & 0x10) >> 4;
								break;
							case 4 :
								$color [1] = ($color [1] & 0x8) >> 3;
								break;
							case 5 :
								$color [1] = ($color [1] & 0x4) >> 2;
								break;
							case 6 :
								$color [1] = ($color [1] & 0x2) >> 1;
								break;
							case 7 :
								$color [1] = ($color [1] & 0x1);
								break;
						}
						$color [1] = $palette [$color [1] + 1];
						break;
					default :
						trigger_error ( 'imagecreatefrombmp: ' . $filename . ' has ' . $meta ['bits'] . ' bits and this is not supported!', E_USER_WARNING );
						return false;
				}
				imagesetpixel ( $im, $x, $y, $color [1] );
				$x ++;
				$p += $meta ['bytes'];
			}
			$y --;
			$p += $meta ['decal'];
		}
		fclose ( $fh );
		return $im;
	}
}
