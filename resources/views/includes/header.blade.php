<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/tasks"><b>Task Management</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item @if(Route::currentRouteName() == 'tasks') active @endif">
          <a class="nav-link" href="/tasks">All Tasks</a>
        </li>
        <li class="nav-item @if(Route::currentRouteName() == 'add-task') active @endif">
          <a class="nav-link" href="/add-task">Add Task</a>
        </li>
        <li class="nav-item @if(Route::currentRouteName() == 'pending-task') active @endif">
          <a class="nav-link" href="/pending-task">All Pending Task</a>
        </li>
        <li class="nav-item @if(Route::currentRouteName() == 'completed-task') active @endif">
          <a class="nav-link" href="/completed-task">All Completed Task</a>
        </li>
        <li class="nav-item @if(Route::currentRouteName() == 'users') active @endif">
          <a class="nav-link" href="/users">All Users</a>
        </li>
        <li class="nav-item @if(Route::currentRouteName() == 'add-user') active @endif">
          <a class="nav-link" href="/add-user">Add User</a>
        </li>
      </ul>

    </div>
  </div>
</nav>