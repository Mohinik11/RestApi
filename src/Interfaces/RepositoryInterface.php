<?php

    namespace Interfaces;

    Interface RepositoryInterface
    {
        public function get();
        public function getById($id);
    }