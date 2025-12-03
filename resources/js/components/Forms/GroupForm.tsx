import { useForm } from '@inertiajs/react';
import { Menu, Group } from '@/types/group';
import { route } from 'ziggy-js';

interface Props {
    grupo?: Group;
    menus: Menu[];
}

export default function GroupForm({ grupo, menus }: Props) {
    console.log(grupo);

    const { data, setData, post, put, processing, errors } = useForm({
        nombre: grupo?.nombre ?? "",
        fecha_de_llegada: grupo?.fecha_de_llegada ?? "",
        fecha_de_salida: grupo?.fecha_de_salida ?? "",
        menu_id: grupo?.menus?.id ?? "",
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        if (grupo) {
            put(route('grupos.update', grupo.id));
        } else {
            post(route('grupos.store'));
        }
    };

    return (
        <form onSubmit={submit} className="space-y-4">
            <div>
                <label>Nombre</label>
                <input
                    className="border p-2 w-full"
                    value={data.nombre}
                    onChange={e => setData('nombre', e.target.value)}
                />
                <p className="text-red-500 text-sm">{errors.nombre}</p>
            </div>

            <div>
                <label>Fecha de llegada</label>
                <input
                    type="date"
                    className="border p-2 w-full"
                    value={data.fecha_de_llegada}
                    onChange={e => setData('fecha_de_llegada', e.target.value)}
                />
            </div>

            <div>
                <label>Fecha de salida</label>
                <input
                    type="date"
                    className="border p-2 w-full"
                    value={data.fecha_de_salida}
                    onChange={e => setData('fecha_de_salida', e.target.value)}
                />
            </div>

            <div>
                <label>Menú</label>
                <select
                    className="border p-2 w-full"
                    value={data.menu_id ?? ""}
                    onChange={e => setData('menu_id', Number(e.target.value))}
                >
                    <option value="">{grupo?.menus?.nombre ?? "No menu"}</option>
                    {menus.map(menu => (
                        <option key={menu.id} value={menu.id}>
                            {menu.nombre}
                        </option>
                    ))}
                </select>
            </div>

            <button
                disabled={processing}
                className="bg-blue-600 text-white px-4 py-2 rounded"
            >
                {grupo ? "Update" : "Create"}
            </button>
        </form>
    );
}
