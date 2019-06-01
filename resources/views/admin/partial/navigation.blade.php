 
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li @if (Request::is('dashboard')) class="active" @endif>
                 <a href="/admin">
                    <i class="icon-home"></i> <span>Dashboard</span>
                </a>
            </li>
            
            <li class="{{ Request::is('posts', 'categories/create', 'category.edit') ? 'active' : '' }}"> 
                <a href="/admin/posts">
                    <i class="icon-list"></i> <span>Posts</span>
                </a>
            </li>
            
            <li class="{{ Request::is('users') ? 'active' : '' }}"> 
                <a href="/admin/users">
                    <i class="icon-users"></i> <span>Users</span>
                </a>
            </li>     
            
        </ul>
    </section>
</aside>

