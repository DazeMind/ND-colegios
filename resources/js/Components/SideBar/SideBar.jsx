import { Link,usePage  } from '@inertiajs/react';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import logorectangulo from '@/assets/image/logo_rectangulo.svg';
import icon_home from '@/assets/image/icon_home.svg';
import icon_school from '@/assets/image/icon_school.svg';
import icon_user from '@/assets/image/icon_user.svg';
import icon_logout from '@/assets/image/icon_logout.svg';
import icon_group from '@/assets/image/icon_group.svg';
import icon_acount from '@/assets/image/icon_acount.svg';


export default function SideBar() {
  const { auth } = usePage().props;
  const user = auth?.user;
  
  const menu = [
    { label: 'Dashboard', route: '/dashboard' ,icon: icon_home},
    { label: 'Institucion', route: '/institution',icon: icon_school },
    { label: 'Colegios', route: '/schools',icon: icon_user },
    { label: 'Usuarios', route: '/user',icon: icon_group },
  ];

  return (
    <aside className="w-64 h-screen bg-gray-800 text-white fixed">
      <div className="p-4 text-xl font-bold border-b border-gray-700">
        <img
            src={logorectangulo}
            alt="Logo"
            className="h-auto w-auto"
        />
        </div>
          <div className="border-t border-gray-200 pb-1 pt-4">
            <div className="px-4">
                <div className="mt-1 flex items-center gap-2 text-sm font-medium text-white">
                    <img
                        src={icon_acount}
                        alt="Icono de usuario"
                        className="h-5 w-5"
                    />
                    <div className="text-base font-medium text-white">
                    <Link href={route('profile.edit')}>
                      {user?.name}
                    </Link>
                  </div>
                </div>
            </div>
        </div>

      <nav className="mt-4">
        {menu.map((item) => (
          <Link
            key={item.route}
            href={item.route}
            className="flex items-center gap-2 px-4 py-2 hover:bg-gray-700 transition text-white"
          >
            <img
              src={item.icon}
              alt="Logo"
              className="h-5 w-5"
            />
            <span>{item.label}</span>
          </Link>
        ))}
      </nav>
      <ResponsiveNavLink
          method="post"
          href={route('logout')}
          as="button"
          className='text-white'
      >
        <img
          src={icon_logout}
          alt="Logo"
          className=" h-5 w-5"
        />
          Cerrar Sesión
      </ResponsiveNavLink>
    </aside>
  );
}

