import AbstractModel from '../../Abstract/AbstractModel';

export default class CategoryModel extends AbstractModel{

    constructor(jsonData) {
        super();
        this.properties = ['id', 'name', 'parent_category'];
        this.children = [];
        this.dropped = false;
        this.selected = false;
        this.resolveData(jsonData);
    }

    getDropped() {
        return this.dropped;
    }

    setDropped(value) {
        this.dropped = value;
    }

    getSelected() {
        return this.selected;
    }

    setSelected(value) {
        this.selected = value;
    }

    getId() {
        return this.id;
    }

    addChild(model) {
        this.children.push(model);
    }

    getChildren() {
        return this.children;
    }

    getName() {
        return this.name;
    }

    getParentCategory() {
        return this.parent_category;
    }
}