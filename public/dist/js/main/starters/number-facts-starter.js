"use strict";var controller=new NumberFactsController,view=controller.getView();view.getIncreaseFactNumberBtn().addEventListener("click",function(){return controller.increaseFactNumber()}),view.getDecreaseFactNumberBtn().addEventListener("click",function(){return controller.decreaseFactNumber()}),view.getTypeFactNumField().addEventListener("input",function(e){return controller.validateFactNumField(e)}),view.getTypeFactNumField().addEventListener("blur",function(e){return controller.setTypedFactNumber(e)}),view.getTypeFactNumField().addEventListener("keyup",function(e){return controller.setTypedFactNumberWithEnterBtn(e)}),view.getFactNumberContainer().addEventListener("click",function(e){return controller.generateRandomNumber(e)}),document.querySelector("body").addEventListener("click",function(e){return controller.chooseCategoryAndGetFact(e)});