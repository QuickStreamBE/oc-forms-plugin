<?php

namespace Publipresse\Forms\Components;

use Publipresse\Forms\Classes\MagicForm;

class UploadForm extends MagicForm {
    public function componentDetails() {
        return [
            'name' => 'Upload form',
            'description' => 'Create an upload form',
        ];
    }

    public function defineProperties() {
        $properties = [
            'mail_uploads' => [
                'title' => __('Attach uploaded files'),
                'type' => 'checkbox',
                'default' => false,
                'group' => __('Notification settings'),
                'showExternalParam' => false
            ],
            'uploader_enable' => [
                'title' => __('Enable upload'),
                'type' => 'checkbox',
                'default' => false,
                'group' => __('Upload files'),
                'showExternalParam' => false,
            ],
            'maxFiles' => [
                'title' => __('Max number of files'),
                'type' => 'string',
                'default' => '1',
                'group' => __('Upload files'),
                'showExternalParam' => false,
            ],
            'maxFileSize' => [
                'title' => __('Max size per file'),
                'type' => 'string',
                'default' => '2MB',
                'group' => __('Upload files'),
                'showExternalParam' => false,
            ],
            'maxTotalSize' => [
                'title' => __('Max total size'),
                'type' => 'string',
                'default' => '5MB',
                'group' => __('Upload files'),
                'showExternalParam' => false,
            ],
            'fileTypes' => [
                'title' => __('Accepted file types'),
                'type' => 'dictionary',
                'default' => ['application/pdf' => 'pdf', 'application/zip' => 'zip', 'image/png' => 'png', 'image/jpeg' => 'jpg'],
                'group' => __('Upload files'),
                'showExternalParam' => false,
            ],
        ];
        return array_merge(parent::defineProperties(), $properties);
    }
    
    public function onRun() {
        parent::onRun();
        
        $this->addCss('assets/vendor/filepond/filepond.css');
        $this->addJs('assets/vendor/filepond/filepond-plugin-file-validate-type.js', ['defer' => true]);
        $this->addJs('assets/vendor/filepond/filepond-plugin-file-validate-size.js', ['defer' => true]);
        $this->addJs('assets/vendor/filepond/filepond.js', ['defer' => true]);
        
        $this->page['max_files'] = $this->property('maxFiles');
        $this->page['max_filesize'] = $this->property('maxFileSize');
        $this->page['max_totalsize'] = $this->property('maxTotalSize');
        $this->page['allowed_filetypes'] = $this->property('fileTypes');
        
    }
}
