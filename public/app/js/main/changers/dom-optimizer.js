/**
 * @fileOverview Contains operations that adjust DOM
 * @namespace NikitosGolubev\Changers
 */

/**
 * Adjust dom, each method shouldn't return anything
 */
class DomOptimizer {
    /**
     * As attribute target='_blank' is not valid due to W3C, this method may be
     * called to eliminate compliance conflict
     * 
     * @returns {Void}
     */
    fixTargetBlank() {
        // getting collection of links which should be opened at new window
        let targetBlankLinks = document.querySelectorAll('.js-target-blank');

        // adding target attr
        targetBlankLinks.forEach((link) => {
            link.setAttribute('target', '_blank');
        });
    }
}
