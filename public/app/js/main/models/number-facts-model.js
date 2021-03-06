/**
 * @fileOverview Model - part of MVC pattern.
 * @namespace NikitosGolubev\Models
 * @see Observer pattern.
 */

/**
 * Implements all of the business logic.
 * It's also part of Observer pattern. Plays the role of SUBJECT. 
 */
class NumberFactsModel {
    constructor() {
        // Observers storages
        this.factNumberObservers = [];
        this.factCategoryObservers = [];
        /**
         * Fact number to which fact should relate
         * @type {Number}
         */
        this.factNumber = this.getStarterFactNumberFromDOM();

        /**
         * Max amount of digits in fact number
         * @type {Number}
         */
        this.maxNumberLen = 4;

        /**
         * Max fact number
         * @type {Number}
         */
        this.maxNumber = 9999;

        /**
         * Current fact category to which facts should relate
         * @type {String}
         */
        this.factCategory = this.getCurrentFactCategoryDOM();
    }

    /**
     * Registers observer.
     *
     * @param  {Object} observer Usually view object.
     * @returns {Void}
     */
    registerFactNumberObserver(observer) {
        this.factNumberObservers.push(observer); 
    }

    /**
     * Removes observer from container.
     * @param  {Object} observer
     * @returns {Void}
     */
    removeFactNumberObserver(observer) {
        // Searching for observer
        let indexOfObserver = this.factNumberObservers.indexOf(observer);

        if (indexOfObserver > -1) {
            // Removing observer
            this.factNumberObservers.splice(indexOfObserver, 1);
        }
    }

    /**
     * Notifing observers about change of fact data.
     * 
     * @param  {data} Object with fact data
     * @returns {Void}
     */
    notifyFactNumberObservers(data) {
        // If INTEGER was returned(maybe inside string, like "23")
        // Number should be displayed in following format 0023, converting...
        if (Number.isInteger(+data.number)) {
            data.number = this.convertToNumberWithForwardZeros(data.number);
        }

        // notifying observers
        for (let i = 0; i < this.factNumberObservers.length; i++) {
            this.factNumberObservers[i].updateFactNumber(data);
        }
    }

    /**
     * Getter for current fact number.
     * @returns {Number}
     */
    getFactNumber() {return this.factNumber;}

    /**
     * Sets new fact number
     * @param {Number} factNumber
     * @returns {Void}
     */
    setFactNumber(factNumber) {
        // Sometimes factNumber may not be valid here, so it's worth to validate it first.
        this.factNumber = this.alignFactNumberWithLimit(factNumber);

        // AS we know what number we're dealing with, then we can request it
        // Sending request to server to get data
        this.getFactWithConcreteNumber();
    }

    /**
     * Sends requets that retrives fact with RANDOM fact number from particular category.
     * @returns {Void}
     */
    getFactWithRandomNumber() {
        let uri = `api/${this.factCategory}`;
        // As we don't know what number was generated yet, so we retrive it from
        // response and update current fact number as it was already set.
        this.getFactData(uri).then(data => this.factNumber = data.number);
    }

    /**
     * Sends requets that retrives fact with CONCRETE fact number from particular category.
     * @return {Void}
     */
    getFactWithConcreteNumber() {
        let uri = `api/${this.factCategory}/${this.factNumber}`;
        this.getFactData(uri);
    }

    /**
     * Sends request to server to retrive fact data and then notifies observers about fetched data.
     * @param  {String} uri
     * @return {Object} Promise with data
     */
    getFactData(uri) {
        return fetch(uri)
        .then(response => response.json())
        .then(data => {
            this.notifyFactNumberObservers(data);
            return data;
        })
        .catch(err => console.log(err));
    }

    /**
     * Registers observer.
     *
     * @param  {Object} observer Usually view object.
     * @returns {Void}
     */
    registerFactCategoryObserver(observer) {
        this.factCategoryObservers.push(observer); 
    }

    /**
     * Removes observer from container.
     * @param  {Object} observer
     * @returns {Void}
     */
    removeFactCategoryObserver(observer) {
        // Searching for observer
        let indexOfObserver = this.factCategoryObservers.indexOf(observer);
        // Removing observer
        this.factCategoryObservers.splice(indexOfObserver, 1);
    }

    /**
     * Notifing observers about change of fact category.
     * 
     * @param  {Number} factNumber
     * @returns {Void}
     */
    notifyFactCategoryObservers(category) {
        // notifying observers
        for (let i = 0; i < this.factCategoryObservers.length; i++) {
            this.factCategoryObservers[i].updateFactCategory(category);
        }
    } 

    /**
     * Getting current fact category from attribute of HTML element.
     * @returns {String}
     */
    getCurrentFactCategoryDOM() {
        // Finding container of current fact cat
        let factCatStorage = document.querySelector('.js-current-fact-category');
        // Fetching it
        let currentFactCat = factCatStorage.getAttribute('current-fact-category');
        return currentFactCat;
    }

    /**
     * Checks if category changed, if so updates it. Than sends request
     * to get random fact from this category.
     * 
     * @param  {Object} categoryControlBtn DOM
     * @returns {Void}
     */
    chooseCategoryAndGetFact(categoryControlBtn) {
        let chosenCategory = categoryControlBtn.getAttribute('fact-category');
        if (chosenCategory !== this.factCategory) this.setCurrentFactCategory(chosenCategory);
        this.getFactWithRandomNumber();
    }

    /**
     * Changes current fact category and notifies observers about it.
     * @param {String} category
     */
    setCurrentFactCategory(category) {
        this.factCategory = category;
        this.notifyFactCategoryObservers(category);
    }

    /**
     * Increasing fact number on a unit.
     * @returns {Void}
     */
    increaseFactNumber() {
    	// important to use before inc to pass changed value
        this.setFactNumber(++this.factNumber);
    }

    /**
     * Decreasing fact number on a unit.
     * @returns {Void}
     */
    decreaseFactNumber() {
    	// important to use before dec to pass changed value
        this.setFactNumber(--this.factNumber);
    }

    /**
     * Validates fact number input value. Supposed to be binded on event.
     * @param  {Object} event
     * @returns {Void}
     */
    validateFactNumField(event) {
        let field = event.target;

        let noneDigitSymbolPos = field.value.search(/\D/i);

        // User may type ONLY DIGITS, no other characters allowed, so cutting them out
        if (noneDigitSymbolPos > -1) field.value = field.value.substr(0, noneDigitSymbolPos);

        // The length of number is limited
        if (field.value.length > this.maxNumberLen) {
            field.value = field.value.substr(0, this.maxNumberLen);
        }

        // If number exceeds the maximum, than shorten it on 1 digit
        // Example:
        // max = 100; given = 101; validated = 10;
        if (+field.value > this.maxNumber) {
            let shortenNumberLength = field.value.length - 1;
            field.value = field.value.substr(0, shortenNumberLength);
        }
    }

    /**
     * Setting value from fact number field as current fact number.
     * @param {Object} event
     * @returns {Void}
     */
    setTypedFactNumber(event) {
        // if empty field was passed, so there are no number inside it
        if (event.target.value !== '') {
            // getting fields value
            let numberFromField = +event.target.value;
            // Setting it
            this.setFactNumber(numberFromField);
            // Empties field
            event.target.value = "";
            // Removing focus from field
            document.activeElement.blur();
        }
    }

    /**
     * When the page is loaded, we don't know what fact number is currently set, so I fetch
     * it from DOM, cuz it should be displayed on screen (or mb inside some attr).
     * 
     * @returns {Number}
     */
    getStarterFactNumberFromDOM() {
        // Getting number from DOM (it may be displayed differently, but generaly it's string)
        let factNumberString = document.querySelector('.js-fact-number').innerText;
        // As we use here forward zeros approach, so we eliminating them to get valid number. 
        let factNumber = this.convertToNumberWithoutForwardZeros(factNumberString);
        return factNumber;
    }

    /**
     * Eliminating forward zeros.
     * @param  {String} numberString
     * @returns {Number}
     */
    convertToNumberWithoutForwardZeros(numberString) {
        // Just converting from string to number type, JS would reduce zeros automatically.
        return +numberString;
    }

    /**
     * Adding forward zeros to number.
     * @param  {Number} number
     * @returns {String}
     */
    convertToNumberWithForwardZeros(number) {
        let numberString = ""+number; // toString
        let numberStringLen = numberString.length;
        // Calculating amount of zeros to add by 
        // substracting MAX amount of digits in number from current number length.
        let numZerosToAdd = this.maxNumberLen - numberStringLen;

        // Adding forward zeros
        if (numZerosToAdd > 0) {
            for (let i = 0; i < numZerosToAdd; i++) {
                numberString = "0"+numberString;
            }
        }

        return numberString;
    }

    /**
     * Validates if fact number fulfills its limits and if not turns it to max or min.
     * @param  {Number} number
     * @returns {Number}
     */
    alignFactNumberWithLimit(number) {
        // Assuming that fact number may be only positive
        let factNumberStringLen = (""+number).length;
        
        // if to little, then - 0
        // else if to big then - to max number
        // else its ok, then - returning passed number
        if (factNumberStringLen > this.maxNumberLen) number = 0;
        else if (number < 0) {
            number = this.maxNumber;
        }

        return number;
    }
}
