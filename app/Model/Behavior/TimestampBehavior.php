<?php
App::uses('ModelBehavior', 'Model');

class TimestampBehavior extends ModelBehavior {

    public function beforeSave(Model $model, $options = array()) {
        if (isset($model->data[$model->alias]['id'])) {
            // Update 'modified' field for existing records
            $model->data[$model->alias]['updated_at'] = date('Y-m-d H:i:s');
        } else {
            // Set 'created' and 'modified' fields for new records
            $model->data[$model->alias]['created_at'] = date('Y-m-d H:i:s');
            $model->data[$model->alias]['updated_at'] = date('Y-m-d H:i:s');
        }
        return true;
    }
}
