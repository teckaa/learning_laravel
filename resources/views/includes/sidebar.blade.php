<aside class="sidebar pos-fixed z-2"
data-role="sidebar"
data-toggle="#sidebar-toggle-4"
id="sb4"
data-shift=".shifted-content-2"
data-static-shift=".shifted-content-2"
data-static="md" style="margin-top: 50px;">


<ul class="sidebar-menu" style='overflow: auto;'>
    <li class='{{ Request::is('customers*') ? 'bg-lightGray border border-size-4 bd-cobalt border-top-none border-bottom-none border-right-none' : '' }}'>
        <a href="{{ url('customers') }}">
            <ion-icon name="people-circle-outline"></ion-icon>
            Customers
            <span class="badges">
                <span class="badge inline text-right">
                    {{ App\Customer::where('user_id', Auth::user()->id)->count() }}
                </span>
            </span>
        </a>
    </li>
    <li class='{{ Request::is('invoices*') ? 'bg-lightGray border border-size-4 bd-cobalt border-top-none border-bottom-none border-right-none' : '' }}'>
      <a href="{{ url('invoices') }}">
          <ion-icon name="newspaper-outline"></ion-icon>
          Invoices
          <span class="badges">
              <span class="badge inline text-right">
                  {{ App\Invoice::where('user_id', Auth::user()->id)->count() }}
              </span>
          </span>
      </a>
    </li>
    <li class='{{ Request::is('receipts*') ? 'bg-lightGray border border-size-4 bd-cobalt border-top-none border-bottom-none border-right-none' : '' }}'>
        <a href="{{ url('receipts') }}">
          <ion-icon name="receipt-outline"></ion-icon>
          Receipts
          <span class="badges">
              <span class="badge inline text-right">
                  {{ App\Receipt::count() }}
              </span>
          </span>
        </a>
    </li>
    <li class='{{ Request::is('trash') ? 'bg-lightGray border border-size-4 bd-cobalt border-top-none border-bottom-none border-right-none' : '' }}'>
        <a href="{{ url('customers/bin') }}">
          <ion-icon name="trash-outline"></ion-icon>
          Trash
        </a>
    </li>
    <li class="group-title">Settings</li>
    <li class='{{ Request::is('user/edit') ? 'bg-lightGray border border-size-4 bd-cobalt border-top-none border-bottom-none border-right-none' : '' ||
                  Request::is('user/picture') ? 'bg-lightGray border border-size-4 bd-cobalt border-top-none border-bottom-none border-right-none' : ''
                  }}'>
        <a href="{{ url('user/edit') }}">
          <ion-icon name="person-circle-outline"></ion-icon>
          Profile
        </a>
    </li>
    <li class='{{ Request::is('user/settings') ? 'bg-lightGray border border-size-4 bd-cobalt border-top-none border-bottom-none border-right-none' : '' }}'>
        <a href="{{ url('user/settings') }}">
          <ion-icon name="settings-outline"></ion-icon>
          Settings
        </a>
    </li>
    <li class="divider"></li>
    <li>
      <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
          <ion-icon name="exit-outline"></ion-icon>{{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </li>
</ul>
</aside>
