import empresas from './empresas'
import heroes from './heroes'
import marcas from './marcas'
import menus from './menus'
const resources = {
    empresas: Object.assign(empresas, empresas),
heroes: Object.assign(heroes, heroes),
marcas: Object.assign(marcas, marcas),
menus: Object.assign(menus, menus),
}

export default resources