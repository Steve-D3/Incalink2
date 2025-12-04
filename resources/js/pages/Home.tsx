import React from 'react'
import { Link } from '@inertiajs/react'

const Home = () => {
    return (
        <div>
            <Link href={'grupos'}>Grupos</Link>
            <h1>Home</h1>
            <p className="text-red-500">Hello world</p>
        </div>
    )
}

export default Home