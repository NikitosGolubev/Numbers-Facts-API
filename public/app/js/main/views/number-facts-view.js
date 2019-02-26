/**
 * @fileOverview View object - part of MVC.
 * @namespace NikitosGolubev\Views
 */

/**
 * Creates view elements and fetches them from DOM.
 * Also, updates data which comes from model visually.
 * It's OBSERVER - part of Observer pattern. Observes fact number.
 */
class NumberFactsView {
    constructor(model) {
        // Fetching and initializing UI elements.
        this.increaseFactNumberBtn = document.querySelector('.js-increase-fact-number');
        this.decreaseFactNumberBtn = document.querySelector('.js-decrease-fact-number');
        this.typeFactNumField = document.querySelector('.js-type-fact-num-field');

        this.factNumberContainer = document.querySelector('.js-fact-number');
        this.factContainer = document.querySelector('.js-fact');

        this.currentFactCatContainer = document.querySelector('.js-current-fact-category');

        // Useful class names
        this.factCategoryClassName = 'js-fact-category';
        this.activeCatElemClassName = 'facts-interface__fact-category_active';


        
        // Initializing model
        this.model = model;
        // Registering view as observer of model
        this.model.registerFactNumberObserver(this);
        this.model.registerFactCategoryObserver(this);
    }

    /**
     * Method that is called(by subject) when fact data changes.
     * Updates fact data visually everywhere, where it's displayed.
     * 
     * @param  {String} factNumber Formated fact number, ready to appear to user.
     * @returns {Void}
     */
    updateFactNumber(data) {
        this.factNumberContainer.innerText = data.number;
        this.factContainer.innerText = data.fact;
    }

    /**
     * Updates view of fact category menu. (changes active elements if needed).
     * Also changes current-fact-category attr value.     *
     * 
     * @param  {String} category Changed fact category.
     * @returns {Void}
     */
    updateFactCategory(category) {
        this.currentFactCatContainer.setAttribute('current-fact-category', category);

        let oldActiveCatElem = document.querySelector('.'+this.activeCatElemClassName);
        oldActiveCatElem.classList.remove(this.activeCatElemClassName);

        let newActiveCatElem = document.querySelector(`[fact-category='${category}']`);
        newActiveCatElem.classList.add(this.activeCatElemClassName);
    }

    /**
     * Returns DOM element: IncreaseFactNumberBtn. (Getter)
     * @returns {Object} DOM
     */
    getIncreaseFactNumberBtn() {return this.increaseFactNumberBtn;}

    /**
     * Returns DOM element: DecreaseFactNumberBtn. (Getter)
     * @returns {Object} DOM
     */
    getDecreaseFactNumberBtn() {return this.decreaseFactNumberBtn;}

    /**
     * Returns DOM element: TypeFactNumField. (Getter)
     * @returns {Object} DOM
     */
    getTypeFactNumField() {return this.typeFactNumField;}

    /**
     * Returns DOM element: FactNumberContainer. (Getter)
     * @returns {Object} DOM
     */
    getFactNumberContainer() {return this.factNumberContainer;}

    /**
     * Returns class name of fact category container(-s)
     * @returns {String}
     */
    getFactCategoryClassName() {return this.factCategoryClassName;}
}
