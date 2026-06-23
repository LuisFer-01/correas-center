import empresas from './empresas'
import heroes from './heroes'
const resources = {
    empresas: Object.assign(empresas, empresas),
heroes: Object.assign(heroes, heroes),
}

export default resources