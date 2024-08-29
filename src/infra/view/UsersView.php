<?php

namespace Chiroptera\Layers\Infra\View;

class UsersView {
  public static function html(): string {
    return "
      <html>
        <head><title>Users</title></head>
        <body>
          <h1>Users List</h1>
          <ul>
            <li>User 1</li>
            <li>User 2</li>
            <li>User 3</li>
          </ul>
        </body>
      </html>
    ";
  }
}
