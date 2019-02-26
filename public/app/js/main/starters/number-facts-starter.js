/**
 * @fileOverview File which initializes controller and puts event listeners on appropriate actions
 * @namespace NikitosGolubev\Starters
 */

// Initializing controller
let controller = new NumberFactsController();
let view = controller.getView();

// Clicking on btn that should change number fact on a unit (++) or (--)
view.getIncreaseFactNumberBtn().addEventListener('click', () => controller.increaseFactNumber());
view.getDecreaseFactNumberBtn().addEventListener('click', () => controller.decreaseFactNumber());

// Validating field input
view.getTypeFactNumField().addEventListener('input', (event) => controller.validateFactNumField(event));

// Setting fact number from field
view.getTypeFactNumField().addEventListener('blur', (event) => controller.setTypedFactNumber(event));
view.getTypeFactNumField().addEventListener('keyup', (event) => controller.setTypedFactNumberWithEnterBtn(event));

// Generating random number when clicking on current fact number element
view.getFactNumberContainer().addEventListener('click', (event) => controller.generateRandomNumber(event));
// Generating random number when clicking on choose category btn
document.querySelector('body').addEventListener('click', (event) => controller.chooseCategoryAndGetFact(event));