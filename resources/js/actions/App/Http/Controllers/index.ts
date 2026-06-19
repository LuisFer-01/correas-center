import ProductController from './ProductController'
import BrandController from './BrandController'
import IndustryController from './IndustryController'
import ServiceController from './ServiceController'
import SucursalController from './SucursalController'
import PageController from './PageController'
import ContactController from './ContactController'
import SearchController from './SearchController'
import Settings from './Settings'
const Controllers = {
    ProductController: Object.assign(ProductController, ProductController),
BrandController: Object.assign(BrandController, BrandController),
IndustryController: Object.assign(IndustryController, IndustryController),
ServiceController: Object.assign(ServiceController, ServiceController),
SucursalController: Object.assign(SucursalController, SucursalController),
PageController: Object.assign(PageController, PageController),
ContactController: Object.assign(ContactController, ContactController),
SearchController: Object.assign(SearchController, SearchController),
Settings: Object.assign(Settings, Settings),
}

export default Controllers