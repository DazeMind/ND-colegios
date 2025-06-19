// resources/js/Components/Sidebar.jsx
import { Link,usePage } from '@inertiajs/react';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';

    // const user = usePage().props.auth.user;

export default function SideBar() {
  const menu = [
    { label: 'Dashboard', route: '/dashboard' },
    { label: 'Institucion', route: '/institution/create' },
    { label: 'Colegios', route: '/schools/create' },
    { label: 'Usuarios', route: '/user/create' },
  ];

  return (
    <aside className="w-64 h-screen bg-gray-800 text-white fixed">
      <div className="p-4 text-xl font-bold border-b border-gray-700">app</div>
          <div className="border-t border-gray-200 pb-1 pt-4">
                        <div className="px-4">
                            <div className="text-base font-medium text-gray-800">
                                NOMBRE
                            </div>
                            <div className="text-sm font-medium text-gray-500">
                                CORREO
                            </div>
                        </div>

                        <div className="mt-3 space-y-1">
                            <ResponsiveNavLink href={route('profile.edit')}>
                                Profile
                            </ResponsiveNavLink>
                            
                        </div>
                    </div>

      <nav className="mt-4">
        {menu.map((item) => (
          <Link
            key={item.route}
            href={item.route}
            className="block px-4 py-2 hover:bg-gray-700 transition"
          >
            {item.label}
          </Link>
        ))}
      </nav>
      <ResponsiveNavLink
          method="post"
          href={route('logout')}
          as="button"
      >
          Log Out
      </ResponsiveNavLink>
    </aside>
  );
}

