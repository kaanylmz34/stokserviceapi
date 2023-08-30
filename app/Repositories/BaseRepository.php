<?php

    namespace App\Repositories;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Collection;

    class BaseRepository
    {

        /**
         * Model nesnesi.
         */
        protected Model $model;

        /**
         * CRUD operasyonları için kullanılacak olan model alanları.
         */
        protected array $fields;

        /**
         * Silinmiş veya silinmemiş tüm kayıtları getirir.
         */
        public function getAllRecords() : Collection
        {
            return $this->model->withTrashed()->get();
        }

        /**
         * Silinmemiş tüm kayıtları getirir.
         */
        public function getActiveRecords() : Collection
        {
            return $this->model->all();
        }

        /**
         * Silinmiş tüm kayıtları getirir.
         */
        public function getDeletedRecords() : Collection
        {
            return $this->model->onlyTrashed()->get();
        }

    }