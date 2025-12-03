import { Group } from "@/types/group";

interface Props {
    grupo: Group;
}

export default function GroupsShow({ grupo }: Props) {
    console.log(grupo);
    return (
        <div className="p-6">
            <h1 className="text-3xl font-bold mb-4">{grupo.nombre}</h1>

            <p><strong>Menu:</strong> {grupo.menus?.nombre ?? "None"}</p>
            <p><strong>Arrival:</strong> {grupo.fecha_de_llegada}</p>
            <p><strong>Departure:</strong> {grupo.fecha_de_salida}</p>
            <p><strong>Persons:</strong> {grupo.personas_count}</p>
        </div>
    );
}
