<?php

namespace CarRepair\Authorization;

use Illuminate\Auth\AuthManager;

class CustomAuthManager extends AuthManager {

    public function createDatabaseDriver() {
        $provider = $this->createDatabaseProvider();

        return new CustomGuard($provider, $this->app['session.store']);
    }

    public function createEloquentDriver() {
        $provider = $this->createEloquentProvider();

        return new CustomGuard($provider, $this->app['session.store']);
    }

    protected function callCustomCreator($driver) {
        $custom = parent::callCustomCreator($driver);

        if ($custom instanceof Guard)
            return $custom;

        return new CustomGuard($custom, $this->app['session.store']);
    }

}
