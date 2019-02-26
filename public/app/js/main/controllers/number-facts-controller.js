/**
 * @fileOverview Controller - part of MVC.
 * @namespace NikitosGolubev\Controllers
 */

/**
 * Creates appropriate view and model
 */
class NumberFactsController {
    constructor() {
        // Creating model and view
        this.model = new NumberFactsModel();
        this.view = new NumberFactsView(this.model);
    }

    /**
     * Returns view object. (Getter)
     * @returns {Object} View
     */
    getView() {return this.view;}

    /**
     * Calls models API to increase fact number
     * @returns {Void}
     */
    increaseFactNumber() {
        this.model.increaseFactNumber();
    }

    /**
     * Calls models API to decrease fact number
     * @returns {Void}
     */
    decreaseFactNumber() {
        this.model.decreaseFactNumber();
    }

    /**
     * Calls models API to validate the input with fact number.
     * @returns {Void}
     */
    validateFactNumField(event) {
        this.model.validateFactNumField(event);
    }

    /**
     * Calls models API to set fact number from input.
     * @returns {Void}
     */
    setTypedFactNumber(event) {
        this.model.setTypedFactNumber(event);
    }

    /**
     * Calls models API to set fact number from input after user pressed ENTER key.
     * @returns {Void}
     */
    setTypedFactNumberWithEnterBtn(event) {
        // Enter btn code is 13
        if (event.keyCode === 13) {
            this.model.setTypedFactNumber(event);
        }
    }

    /**
     * Calls models API to generate random number with a fact
     * @param  {Object} event
     * @returns {Void}
     */
    generateRandomNumber(event) {
        this.model.getFactWithRandomNumber();
    }

    /**
     * Calls model API to choose fact category and generate random number with a fact.
     * @see  main.js for findParentByClassName()
     * @param  {Object} event
     * @returns {Void}
     */
    chooseCategoryAndGetFact(event) {
        // class name of btn from categories menu
        let factCategoryClassName = this.view.getFactCategoryClassName();
        // Getting the btn that was used(to avoid it's children)
        let categoryControlBtn = findParentByClassName(event.target, factCategoryClassName);
        // If category btn was used, than take action
        if (categoryControlBtn) {
            this.model.chooseCategoryAndGetFact(categoryControlBtn);
        }
    }
}