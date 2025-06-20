import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@headlessui/react';
import { Head,router,usePage } from '@inertiajs/react';
import { Typography } from '@material-tailwind/react';
import FlashMessage from '@/Components/FlashMessage';
import { useState } from 'react';
import TabsNav from '@/Components/NavBar/NavsBar';

function createUser() {
    router.get(route('user.create'), {
        onFinish: () => console.log('redirigiendo'),
    });
}

const TABLE_HEAD = ['ID', 'USUARIO', 'RUT', 'CORREO', 'COLEGIO ASOCIADO'];

export default function Dashboard({users}) {
    const { flash } = usePage().props;
    const [flashMessage, setFlashMessage] = useState(flash);

    return (
        <AuthenticatedLayout
        header={ <TabsNav activeTabKey="usuarios"/> }
        >
        <Head title="Dashboard" />
        <div className="py-12">
            <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="flex items-center justify-end mb-4">
                    {/* <TextInput className="text-lg font-bold" placeholder="Buscar ..." /> */}
                    <Button onClick={createUser} className='ms-12 bg-yellow-500 text-white px-12 py-2 rounded hover:bg-blue-600'>
                    + Agregar usuario 
                    </Button>
                </div>
                {flashMessage?.message && (
                    <div className="p-6">
                        <FlashMessage
                            variant={flashMessage.type}
                            title={flashMessage.title}
                            content={flashMessage.content}
                            show={true}
                            onDismiss={() => setFlashMessage(null)}
                        />
                    </div>
                )}
                <div className="overflow-x-auto bg-white shadow-sm sm:rounded-lg">
                    <table className="w-full min-w-max table-auto text-left">
                        <thead>
                            <tr>
                            {TABLE_HEAD.map((head) => (
                                <th
                                key={head}
                                className="border-b border-blue-gray-100 bg-blue-gray-50 p-4"
                                >
                                <Typography
                                    variant="small"
                                    color="blue-gray"
                                    className="font-normal opacity-70"
                                >
                                    {head}
                                </Typography>
                                </th>
                            ))}
                            </tr>
                        </thead>

                    <tbody>
                        {users.map((user, index) => {
                        const isLast = index === users.length - 1;
                        const classes = isLast ? "p-4" : "w-auto p-4 border-b border-blue-gray-50";

                        return (
                            <tr key={user.id}>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {user.id}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {user.name+' '+user.surnames}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {user.rut}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {user.email}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal" as="div">
                                        {user.schools.map(school => (
                                            <div key={school.id}>{school.name}</div>
                                        ))}
                                    </Typography>
                                </td>
                            </tr>
                        );
                        })}
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        </AuthenticatedLayout>
    );
}

