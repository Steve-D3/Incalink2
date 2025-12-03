import { Group } from "@/types/group";
import { route } from "ziggy-js";

interface Props {
    grupos: Group[];
}

export default function GroupsIndex({ grupos }: Props) {
    return (
        <div className="p-6">
            <h1 className="text-3xl font-bold mb-4">Groups</h1>

            {grupos.map(grupo => (
                <div key={grupo.id} className="p-4 border rounded-lg shadow mb-4">
                    <h2 className="text-xl font-semibold">{grupo.nombre}</h2>
                    <p className="text-gray-600">{grupo.menus?.nombre}</p>

                    <p>Arrival: {grupo.fecha_de_llegada}</p>
                    <p>Departure: {grupo.fecha_de_salida}</p>

                    <p className="mt-2 font-medium">
                        Total persons: {grupo.personas_count}
                    </p>

                    <div className="flex gap-4 mt-4">
                        <a href={route('grupos.edit', grupo.id)} className="text-blue-600">Edit</a>
                        <a href={route('grupos.show', grupo.id)} className="text-green-600">View</a>
                    </div>
                </div>
            ))}
        </div>
    );
}
