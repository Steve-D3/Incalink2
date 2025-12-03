export interface Menu {
    id: number;
    nombre: string;
    receta_id: number;
}

export interface Group {
    id: string;
    nombre: string;
    fecha_de_llegada: string;
    fecha_de_salida: string;
    personas_count: number;
    menus: Menu;   // <-- this matches the backend!
}
