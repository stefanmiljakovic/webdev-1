export default class AbstractModel {

    constructor() {
        this.properties = [];
    }

    sanitizeArgument(argument, defaultValue = null){
        return argument ? argument : defaultValue;
    }

    resolveData(jsonData) {
        this.properties.forEach((entry) => {
           this[entry] = this.sanitizeArgument(jsonData[entry]);
        });
    }
}