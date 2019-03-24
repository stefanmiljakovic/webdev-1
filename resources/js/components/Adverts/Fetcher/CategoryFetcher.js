import CategoryModel from '../Model/CategoryModel'
import AbstractFetch from '../../Abstract/AbstractFetch'

export default class CategoryFetcher extends AbstractFetch {

    constructor() {
        if(CategoryFetcher.instance)
            return CategoryFetcher.instance;

        super();

        this.endpoint = '/api/categories';
        this.promise = this.fetch();
        this.promise.then(() => {
            this.populate();
        });

        CategoryFetcher.instance = this;
    }

    populate() {
        let childContainers = [];
        let all = [];

        this.data.forEach((jsonData) => {
            let model = new CategoryModel(jsonData);

            all.push(model);

            if (model.getParentCategory() != null) {
                if (!childContainers[model.getParentCategory()])
                    childContainers[model.getParentCategory()] = [];
                childContainers[model.getParentCategory()].push(model);
            }
        });

        this.container = this.appendChildren(all, childContainers);
    }


    appendChildren(all, childContainers) {
        all.forEach((categoryModel) => {
            /**
             * Because javascript sucks
             * @type CategoryModel
             */
            let model = categoryModel;

            if(childContainers[model.getId()])
                childContainers[model.getId()].forEach((value) => {
                model.addChild(value);
            });
        });

        return all.filter((val) => {return val.getParentCategory() == null});
    }
}

CategoryFetcher.instance = null;