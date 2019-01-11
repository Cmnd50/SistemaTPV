   <?php

 protected function initDefaultButtons()
     {
         if (!isset($this->buttons['view'])) {
             $this->buttons['view'] = function ($url, $model, $key) {
                 $options = array_merge([
                     'title' => Yii::t('yii', 'Ver registro'),
                     'aria-label' => Yii::t('yii', 'View'),
                     'data-pjax' => '0',
                 ], $this->buttonOptions);
                 return Html::a('<span class=" btn-xs btn-success"><i class="fa fa-search"></i></span>', $url, $options);
             };
         }
         if (!isset($this->buttons['report'])) {
             $this->buttons['report'] = function ($url, $model, $key) {
                 $options = array_merge([
                     'title' => Yii::t('yii', 'Reporte'),
                     'aria-label' => Yii::t('yii', 'Report'),
                     'data-pjax' => '0',
                 ], $this->buttonOptions);
                 return Html::a('<span class=" btn-xs btn-info"><i class="fa fa-file-o"></i></span>', $url, $options);
             };
         }
        if (!isset($this->buttons['medical'])) {
             $this->buttons['medical'] = function ($url, $model, $key) {
                 $options = array_merge([
                     'title' => Yii::t('yii', 'Consulta'),
                     'aria-label' => Yii::t('yii', 'Medical'),
                     'data-pjax' => '0',
                 ], $this->buttonOptions);
                 return Html::a('<span class=" btn-xs btn-primary"><i class="fa fa-medkit"></i></span>', $url, $options);
             };
         }
         if (!isset($this->buttons['update'])) {
             $this->buttons['update'] = function ($url, $model, $key) {
                 $options = array_merge([
                     'title' => Yii::t('yii', 'Editar registro'),
                     'aria-label' => Yii::t('yii', 'Update'),
                     'data-pjax' => '0',
                 ], $this->buttonOptions);
                 return Html::a('<span class=" btn-xs btn-warning"><i class="fa fa-edit"></i></span>', $url, $options);
             };
         }
                  if (!isset($this->buttons['exahemo'])) {
             $this->buttons['exahemo'] = function ($url, $model, $key) {
                 $options = array_merge([
                     'title' => Yii::t('yii', 'Ingresar registro'),
                     'aria-label' => Yii::t('yii', 'ExamenHemo'),
                     'data-pjax' => '0',
                 ], $this->buttonOptions);
                 return Html::a('<span class=" btn-xs btn-info"><i class="fa fa-edit"></i></span>', $url, $options);
             };
         }
                  if (!isset($this->buttons['exaorina'])) {
             $this->buttons['exaorina'] = function ($url, $model, $key) {
                 $options = array_merge([
                     'title' => Yii::t('yii', 'Ingresar registro'),
                     'aria-label' => Yii::t('yii', 'ExamenOrina'),
                     'data-pjax' => '0',
                 ], $this->buttonOptions);
                 return Html::a('<span class=" btn-xs btn-info"><i class="fa fa-edit"></i></span>', $url, $options);
             };
         }
                  if (!isset($this->buttons['exaheces'])) {
             $this->buttons['exaheces'] = function ($url, $model, $key) {
                 $options = array_merge([
                     'title' => Yii::t('yii', 'Ingresar registro'),
                     'aria-label' => Yii::t('yii', 'ExamenHeces'),
                     'data-pjax' => '0',
                 ], $this->buttonOptions);
                 return Html::a('<span class=" btn-xs btn-info"><i class="fa fa-edit"></i></span>', $url, $options);
             };
         }
               if (!isset($this->buttons['exaquimica'])) {
             $this->buttons['exaquimica'] = function ($url, $model, $key) {
                 $options = array_merge([
                     'title' => Yii::t('yii', 'Ingresar registro'),
                     'aria-label' => Yii::t('yii', 'ExamenQuimica'),
                     'data-pjax' => '0',
                 ], $this->buttonOptions);
                 return Html::a('<span class=" btn-xs btn-info"><i class="fa fa-edit"></i></span>', $url, $options);
             };
         }
                  if (!isset($this->buttons['exavarios'])) {
             $this->buttons['exavarios'] = function ($url, $model, $key) {
                 $options = array_merge([
                     'title' => Yii::t('yii', 'Ingresar registro'),
                     'aria-label' => Yii::t('yii', 'ExamenVarios'),
                     'data-pjax' => '0',
                 ], $this->buttonOptions);
                 return Html::a('<span class=" btn-xs btn-info"><i class="fa fa-edit"></i></span>', $url, $options);
             };
         }

         if (!isset($this->buttons['delete'])) {
             $this->buttons['delete'] = function ($url, $model, $key) {
                  $options = array_merge([
                     'title' => Yii::t('yii', 'Eliminar registro'),
                     'aria-label' => Yii::t('yii', 'Delete'),
                     'data-confirm' => Yii::t('yii', '¿Esta seguro de Eliminar este registro?'),
                     'data-toggle' => 'modal',
                     'data-target' => '#modal',
                     'data-method' => 'post',
                     'data-pjax' => '0',
                     // 'data-toggle' => 'modal',
                     //  'data-target' => '#modal',
                     //  'id'          => 'popupModal',
                 ], $this->buttonOptions);
                 return Html::a('<span class=" btn-xs btn-danger"><i class="fa fa-remove"></i></span>', $url, $options);
             };
         }
     }