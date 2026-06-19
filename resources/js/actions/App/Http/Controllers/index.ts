import ProductController from './ProductController'
import IndustryController from './IndustryController'
import ServiceController from './ServiceController'
import PageController from './PageController'
import ContactController from './ContactController'
import SearchController from './SearchController'
import Settings from './Settings'
const Controllers = {
    ProductController: Object.assign(ProductController, ProductController),
IndustryController: Object.assign(IndustryController, IndustryController),
ServiceController: Object.assign(ServiceController, ServiceController),
PageController: Object.assign(PageController, PageController),
ContactController: Object.assign(ContactController, ContactController),
SearchController: Object.assign(SearchController, SearchController),
Settings: Object.assign(Settings, Settings),
}

export default Controllers