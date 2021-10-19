@if (Auth::check())
    
    <div class="sidebar-menu mt-5" >
            <a href="{{ url('/home') }}" class="sidebar-item">
              <i class="fal fa-home sidebar-icon"></i>
              <span class="sidebar-text">Home</span>
              <span class="sidebar-status"></span>
            </a>
            <a href="{{ url('/users') }}" class="sidebar-item">
              <i class="fal fa-user-friends sidebar-icon"></i>
              <span class="sidebar-text">Users</span>
              <span class="sidebar-status"></span>
            </a>
      @if (Auth::user()->role == 'admin')
            <a href="{{ url('/censorship') }}" class="sidebar-item">
              <i class="fal fa-check-double sidebar-icon"></i>
              <span class="sidebar-text">Censorship</span>
              <span class="sidebar-status"></span>
            </a>
      @endif
            <a href="{{ url('/quiz') }}" class="sidebar-item">
              <i class="fal fa-book sidebar-icon"></i>
              <span class="sidebar-text">Quiz</span>
              <span class="sidebar-status"></span>
            </a>

            <a href=" {{ url('/process')}}" class="sidebar-item">
              <i class="fal fa-calendar sidebar-icon"></i>
              <span class="sidebar-text">Work list</span>
              <span class="sidebar-status"></span>
            </a>

    </div>
@endif