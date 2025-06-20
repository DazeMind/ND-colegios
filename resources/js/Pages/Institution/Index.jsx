import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@headlessui/react';
import { Head,router } from '@inertiajs/react';
import { Typography } from '@material-tailwind/react';
import {useForm, usePage} from '@inertiajs/react';
import { useEffect } from 'react';
import { MagnifyingGlassIcon } from '@heroicons/react/24/solid';
import { useState } from 'react';
import FlashMessage from '@/Components/FlashMessage';
function createInstitution() {
    router.get(route('institution.create'), {
        onFinish: () => console.log('redirigiendo'),
    });
}

const TABLE_HEAD = ['ID', 'CLIENTE', 'ESTADO', 'RESPONSABLE'];

export default function Dashboard({institutions, filters }) {
    const { flash } = usePage().props;
    const [flashMessage, setFlashMessage] = useState(flash);

    const { data, setData, get, processing } = useForm({
        search: filters.search || '',
        per_page: filters.per_page || 10,
    });

    function fetchData(pageUrl = null) {
        get(
            pageUrl || route('dashboard'),
            {
            search: data.search,
            per_page: data.per_page,
            },
            { preserveState: true, replace: true }
        );
    }
    
    const handlePerPageChange = (e) => {
        setData('per_page', parseInt(e.target.value));
    };

    useEffect(() => {
        const timeout = setTimeout(() => {
        get(route('dashboard'), {
            preserveState: true,
            replace: true,
            data: { search: data.search },
        });
        }, 500);

        return () => clearTimeout(timeout);
    }, [data.search, data.per_page]);

    function handleShowResume(institution){
        get(route('institution.show', { institution: institution.id }), {
            preserveState: true,
            replace: true,
        });
    }
    return (
        <AuthenticatedLayout >
        <Head title="Intitucion" />
        <div className="py-12">
            <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="mb-6 flex justify-between items-center">
                    <div className="relative text-gray-600 focus-within:text-gray-400">
                        <div className="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <MagnifyingGlassIcon className="w-5 h-5" />
                        </div>
                        <input
                            type="search"
                            className="block w-full py-2 pl-10 pr-3 text-lg text-gray-900 placeholder-gray-500 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Buscar ..."
                            value={data.search}
                            onChange={e => setData('search', e.target.value)}
                        />
                        </div>
                    <Button onClick={createInstitution} className='ms-12 bg-yellow-500 text-white px-12 py-2 rounded hover:bg-blue-600'>
                    + NUEVO 
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
                        <thead className='bg-gray-300'>
                            <tr>
                            {TABLE_HEAD.map((head) => (
                                <th
                                key={head}
                                className="border-b border-blue-gray-100 bg-blue-gray-50 p-4"
                                >
                                <Typography
                                    variant="small"
                                    color="blue-gray"
                                    className="font-bold text-gray-500 opacity-70"
                                >
                                    {head}
                                </Typography>
                                </th>
                            ))}
                            </tr>
                        </thead>

                    <tbody>
                        {institutions.data.map((institution, index) => {
                        const isLast = index === institutions.length - 1;
                        const classes = isLast ? "p-4" : "w-1/4 p-4 border-b border-blue-gray-50";

                        return (
                            <tr key={institution.id} className='hover:bg-gray-300' onClick={() => handleShowResume(institution)} role="button" tabIndex={0}>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {institution.id}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {institution.name}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    <span className={`mr-1 ${
                                        institution.state.id === 1 ? 'text-green-500'
                                        : institution.state.id === 2 ? 'text-yellow-500'
                                        : 'text-red-500'
                                        }`}>●</span> {institution.state.name}
                                    </Typography>
                                </td>
                                <td className={classes}>
                                    <Typography variant="small" color="blue-gray" className="font-normal">
                                    {institution.creator.email}
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

            <div className="flex justify-between items-center px-4 py-2 bg-white ">
                <span className="text-sm text-gray-500">
                    Mostrando {institutions.from} a {institutions.to} de {institutions.total} resultados
                </span>

                <div className="flex items-center space-x-4">
                    <label className="text-sm text-gray-500 flex items-center space-x-2">
                    <span>Filas por página</span>
                    <select
                        className="border border-gray-300 rounded px-5 py-1 text-sm text-gray-700"
                        value={data.per_page}
                        onChange={handlePerPageChange}
                    >
                        <option value={5}>5</option>
                        <option value={10}>10</option>
                        <option value={25}>25</option>
                        <option value={50}>50</option>
                    </select>
                    </label>
                    <span className="text-sm text-gray-500">
                        Página {institutions.current_page} de {institutions.last_page}
                    </span>
                    <div className="flex items-center space-x-1">
                        <button
                            className="p-1 rounded hover:bg-gray-100 text-gray-600"
                            onClick={() => fetchData(institutions.first_page_url)}
                            disabled={!institutions.prev_page_url}
                        >«</button>
                        <button
                            className="p-1 rounded hover:bg-gray-100 text-gray-600"
                            onClick={() => fetchData(institutions.prev_page_url)}
                            disabled={!institutions.prev_page_url}
                        >{'<'}</button>
                        <button
                            className="p-1 rounded hover:bg-gray-100 text-gray-600"
                            onClick={() => fetchData(institutions.next_page_url)}
                            disabled={!institutions.next_page_url}
                        >{'>'}</button>
                        <button
                            className="p-1 rounded hover:bg-gray-100 text-gray-600"
                            onClick={() => fetchData(institutions.last_page_url)}
                            disabled={!institutions.next_page_url}
                        >»</button>
                        </div>
                </div>
            </div>

        </AuthenticatedLayout>
    );
}

