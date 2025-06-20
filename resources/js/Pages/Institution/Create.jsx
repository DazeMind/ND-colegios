import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@headlessui/react';
import { Head, useForm } from '@inertiajs/react';
import { validateRut,validatePhone } from '@/Utils/Validations';
import { useMemo, useState } from 'react';
import Select from 'react-select';
import TabsNav from '@/Components/NavBar/NavsBar';

export default function Create({ regions }) {

    const { data, setData, post, processing, errors, reset } = useForm({
        name: '', rut: '', region: '', commune: '', address: '', phone: '', start_date: '',
    });
    const [phoneFrontendError, setPhoneFrontendError] = useState(null);
    const [rutFrontendError, setRutFrontendError] = useState(null);
    const [selectedRegionId, setSelectedRegionId] = useState(null);

    const filteredCommunes = useMemo(() => {
        const region = regions.find(r => r.id === selectedRegionId);
        if (!region) return [];        
        return region.province.flatMap(province => province.comuna);
    }, [selectedRegionId, regions]);

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setData(name, value);
        if (name === 'phone') {
            setPhoneFrontendError(validatePhone(value) ? null : 'Teléfono no válido');
        }

        if (name === 'rut') {
            setRutFrontendError(validateRut(value) ? null : 'RUT no válido');
        }
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        const isRutValid = validateRut(data.rut);
        const isPhoneValid = validatePhone(data.phone);

        if (!isRutValid) setRutFrontendError('RUT no válido');
        if (!isPhoneValid) setPhoneFrontendError('Teléfono no válido');

        if (!isRutValid || !isPhoneValid) return;

        post(route('institution.store'), {
            onSuccess: () => {
                console.log('Cliente creado correctamente');
                reset();
            },
            onError: (formErrors) => {
                console.error('Error al crear el cliente:', formErrors);
            },
            onFinish: () => {
                console.log('Formulario finalizado');
            }
        });
    };

    const regionOptions = regions.map((region) => ({
        value: region.id.toString(),
        label: region.name,
    }));
    const handleRegionChange = (selectedOption) => {
        const selectedRegion = regions.find(r => r.id.toString() === selectedOption?.value);
        setSelectedRegionId(selectedRegion?.id || null);
        setData('region', selectedOption?.value || '');
        setData('commune', '');
    };

    const communeOptions = filteredCommunes.map((commune) => ({
        value: commune.id.toString(),
        label: commune.name,
    }));

    return (
        <AuthenticatedLayout
            header={
               <TabsNav activeTabKey="cliente"/>
            }
        >
            <Head title="Crear Cliente" /> 
            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <form onSubmit={handleSubmit} className="space-y-4">
                                <div className="flex gap-4">
                                    <div className="w-1/2">
                                        <InputLabel htmlFor="name" value="Nombre" />
                                        <TextInput
                                        id="name"
                                        type="text"
                                        name="name"
                                        value={data.name}
                                        className="mt-1 block w-full"
                                        autoComplete="off"
                                        isFocused={true}
                                        onChange={handleInputChange}
                                        />
                                        <InputError message={errors.name} className="mt-2" />
                                    </div>

                                    <div className="w-1/2">
                                        <InputLabel htmlFor="rut" value="RUT (sin puntos con guion)" />
                                        <TextInput
                                        id="rut"
                                        type="text"
                                        name="rut"
                                        value={data.rut}
                                        className="mt-1 block w-full"
                                        onChange={handleInputChange}
                                        />
                                        <InputError message={rutFrontendError || errors.rut} className="mt-2" />
                                    </div>
                                </div>

                                <div className='flex gap-4'>
                                    <div className="w-1/3">
                                        <InputLabel htmlFor="region" value="Selecciona una región" />
                                        <Select
                                            id="region"
                                            name="region"
                                            className="mt-1 block w-full"
                                            value={regionOptions.find(option => option.value === data.region)}
                                            onChange={handleRegionChange}
                                            options={regionOptions}
                                            placeholder="Seleccione una región..."
                                            isClearable
                                        />
                                        <InputError message={errors.region} className="mt-2" />
                                    </div>
                                    <div className="w-1/3">
                                        <InputLabel htmlFor="commune" value="Selecciona una comuna" />
                                        <Select
                                            id="commune"
                                            name="commune"
                                            className="mt-1 block w-full"
                                            value={communeOptions.find(option => option.value === data.commune)}
                                            onChange={(selectedOption) => {
                                                setData('commune', selectedOption?.value || '');
                                            }}
                                            options={communeOptions}
                                            placeholder="Seleccione una comuna..."
                                            isDisabled={!selectedRegionId}
                                            isClearable
                                        />
                                        <InputError message={errors.commune} className="mt-2" />
                                    </div>
                                    <div className="w-1/3">
                                        <InputLabel htmlFor="address" value="Dirección" />
                                        <TextInput
                                            id="address"
                                            type="text"
                                            name="address"
                                            value={data.address}
                                            className="mt-1 block w-full"
                                            onChange={handleInputChange}
                                        />
                                        <InputError message={errors.address} className="mt-2" />
                                    </div>

                                </div>
                                <div className='flex gap-4'>
                                    <div className="w-1/2">
                                        <InputLabel htmlFor="phone" value="Teléfono" />
                                        <TextInput
                                            id="phone"
                                            type="text"
                                            name="phone"
                                            value={data.phone}
                                            className="mt-1 block w-full"
                                            onChange={handleInputChange}
                                        />
                                        <InputError message={phoneFrontendError || errors.phone} className="mt-2" />
                                        <InputError message={errors.phone} className="mt-2" />
                                    </div>
                                    <div className="w-1/2">
                                        <InputLabel htmlFor="start_date" value="Fecha de Inicio" />
                                        <TextInput
                                            id="start_date"
                                            type="date"
                                            name="start_date"
                                            value={data.start_date}
                                            className="mt-1 block w-full"
                                            onChange={handleInputChange}
                                        />
                                        <InputError message={errors.start_date} className="mt-2" />
                                    </div>
                                </div>
                                <div className="flex items-center justify-start mt-6">
                                    <Button
                                        type="submit"
                                        className="m-4 shadow-lg rounded button border-2 border-gray-400 py-3 px-5"
                                        disabled={processing} 
                                    >
                                        {processing ? 'Cancelando...' : 'Cancelar'}
                                    </Button>
                                    <Button
                                        type="submit"
                                        className="m-4 bg-gray-800 rounded button py-3 px-5 text-white"
                                        disabled={processing} 
                                    >
                                        {processing ? 'Guardando...' : 'Crear Cliente'}
                                    </Button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}