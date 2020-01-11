<?php

namespace App;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;


class NoHashUserProvider extends EloquentUserProvider {
    public function validateCredentials(UserContract $user, array $credentials)
    {
      $plain = $credentials['password'];
      return $plain === $user->getAuthPassword();
    }
}