<?php
 
class LocalFileUploader extends FileUploader
{
    // ensure your HTTP server instance can write to this path.
    // e.g., for Apache
    //     chmod 0774 assets/upload/images/
    //     chown www-data:www-data assets/upload/images/
    const IMAGE_UPLOAD_DIR = 'assets/upload/images';
 
    protected $extensionsAllowed;
 
    public function __construct()
    {
        $this->extensionsAllowed = ['jpg', 'jpeg', 'gif', 'png', 'pdf'];
    }
 
    /**
     * Move uploaded file to the storage directory only if its MIME type is
     * accepted.
     *
     * @param array $file $_FILES array entry w/ details of local file.
     * @throws InvalidArgumentException When file extension isn't supported.
     *                                  You should also validate MIME type.
     * @throws RunTimeException When there are issues moving file to upload directory.
     */
    public function moveFile($file)
    {
        if ($this->uploadIsAllowed($file)) {
            $path = self::IMAGE_UPLOAD_DIR . DIRECTORY_SEPARATOR . $basename($file['name']);
 
            if (!$this->uploadDirectoryExists()) {
                // Attempt to auto-create upload directory.
                $this->assertWritePermissions();
            }
 
            if (move_uploaded_file($file['tmp_name'], $path)) {
                return DIRECTORY_SEPARATOR . $path;
            }
        }
 
        throw new InvalidArgumentException('File could not be uploaded.');
    }
 
    protected function uploadIsAllowed(array $file)
    {
        $filename = basename($file['name']);
        $info = pathinfo($filename);
        $ext = strtolower($info['extension']);
 
        return isset($file['tmp_name']) &&
            isset($info['extension']) &&
            in_array($ext, $this->extensionsAllowed);
    }
 
    protected function uploadDirectoryExists()
    {
        return is_dir(self::IMAGE_UPLOAD_DIR) && is_writable(self::IMAGE_UPLOAD_DIR);
    }
 
    protected function assertWritePermissions()
    {
        if (!is_writable(self::IMAGE_UPLOAD_DIR) ||
            @mkdir(self::IMAGE_UPLOAD_DIR, null , TRUE) === false
        ) {
            throw new RunTimeException('File permission problem, please consult your system administrator.');
        }
    }
}