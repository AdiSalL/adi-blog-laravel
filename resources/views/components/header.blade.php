
  <div class="navbar bg-base-100">
    <div class="flex-1">
      <a class="btn btn-ghost text-xl">Blog Adi</a>
    </div>
    <div class="flex-none gap-2">
      <div class="form-control">
        <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
      </div>
      <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
            <img
              alt="Tailwind CSS Navbar component"
              src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
          </div>
        </div>
        <ul
          tabindex="0"
          class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li class="justify-center">
   
              @auth
                {{Auth::user()->name }}
                <a href="{{ route('posts.create') }}">Create New Post</a>
              @else
                <a href="register">Register</a>
              @endauth
         
          </li>
          <li>
            <a href="#">Settings</a>
          </li>
          <li>
            <div>
              @auth
              <a href="logout">Log Out</a>
            @else
              <a href="login">Log In</a>
            @endauth
                </div>
          </li>
        </ul>
      </div>
    </div>

  </div>
