import empresas from './empresas'
import heroes from './heroes'
import menus from './menus'
const resources = {
    empresas: Object.assign(empresas, empresas),
heroes: Object.assign(heroes, heroes),
menus: Object.assign(menus, menus),
}

export default resources