@extends('layouts.main')

@section('title', 'Numbers & Facts API by NikitosGolubev')
@section('page-description', 'Get facts related to particular numbers')

@section('head-tags')
    <link href="app/css/main/pages/index.css" rel="stylesheet" type='text/css' />
@endsection

@section('main')
    <div class='facts-interface d-flex align-items-center justify-content-center'>
        <div class='facts-interface__element'>
        	<div class='facts-interface__number-container d-flex flex-column align-items-center'>
        		<div class='js-increase-fact-number btn btn_alternative btn_round'>
        			<svg class='arrow arrow__up arrow_primary' version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 284.929 284.929" style="enable-background:new 0 0 284.929 284.929;" xml:space="preserve">
						<path d="M282.082,195.285L149.028,62.24c-1.901-1.903-4.088-2.856-6.562-2.856s-4.665,0.953-6.567,2.856L2.856,195.285 C0.95,197.191,0,199.378,0,201.853c0,2.474,0.953,4.664,2.856,6.566l14.272,14.271c1.903,1.903,4.093,2.854,6.567,2.854 c2.474,0,4.664-0.951,6.567-2.854l112.204-112.202l112.208,112.209c1.902,1.903,4.093,2.848,6.563,2.848 c2.478,0,4.668-0.951,6.57-2.848l14.274-14.277c1.902-1.902,2.847-4.093,2.847-6.566 C284.929,199.378,283.984,197.188,282.082,195.285z"/>
					</svg>
                </div>
        		<div class='js-fact-number facts-interface__fact-number'>{{ $response->number }}</div>
        		<div class='js-decrease-fact-number btn btn_alternative btn_round'>
        			<svg class='arrow arrow__down arrow_primary' version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 284.929 284.929" style="enable-background:new 0 0 284.929 284.929;" xml:space="preserve">
						<path d="M282.082,76.511l-14.274-14.273c-1.902-1.906-4.093-2.856-6.57-2.856c-2.471,0-4.661,0.95-6.563,2.856L142.466,174.441 L30.262,62.241c-1.903-1.906-4.093-2.856-6.567-2.856c-2.475,0-4.665,0.95-6.567,2.856L2.856,76.515C0.95,78.417,0,80.607,0,83.082 c0,2.473,0.953,4.663,2.856,6.565l133.043,133.046c1.902,1.903,4.093,2.854,6.567,2.854s4.661-0.951,6.562-2.854L282.082,89.647 c1.902-1.903,2.847-4.093,2.847-6.565C284.929,80.607,283.984,78.417,282.082,76.511z"/>
					</svg>
        		</div>
        	</div>
        </div>
        <div class='facts-interface__element'>
        	<div class='facts-interface__fact_wrap'>
        	    <div class='facts-interface__fact d-flex align-items-center justify-content-center'>
        	    	<span class='js-fact'>{{ $response->fact }}</span>
        	    </div>
        	</div>
        	<div class='facts-interface__type-fact-num-field_wrap'>
        		<input class='js-type-fact-num-field facts-interface__type-fact-num-field field' type='text' name='number' placeholder="Type your number..." />
        	</div>
        </div>
        <div class='js-current-fact-category facts-interface__element' current-fact-category='random'>
        	<div class='facts-interface__facts-cats-list_wrap'>
        		<ul class='facts-interface__facts-cats-list'>
        			<li class='facts-interface__fact-category_wrap'>
        				<div class='js-fact-category facts-interface__fact-category facts-interface__fact-category_active' fact-category='random'>
        					<span>Random</span>
        				</div>
        			</li>
        			<li class='facts-interface__fact-category_wrap'>
        				<div class='js-fact-category facts-interface__fact-category' fact-category='year'>
        					<span>Year</span>
        				</div>
        			</li>
        			<li class='facts-interface__fact-category_wrap'>
        				<div class='js-fact-category facts-interface__fact-category' fact-category='date'>
        					<span>Date</span>
        				</div>
        			</li>
        			<li class='facts-interface__fact-category_wrap'>
        				<div class='js-fact-category facts-interface__fact-category' fact-category='math'>
        					<span>Math</span>
        				</div>
        			</li>
        		</ul>
        	</div>
        </div>
    </div>
@endsection

@section('footer', '')

@section('scripts')
    <script src='app/js/main/models/number-facts-model.js'></script>
    <script src='app/js/main/views/number-facts-view.js'></script>
    <script src='app/js/main/controllers/number-facts-controller.js'></script>
    <script src='app/js/main/starters/number-facts-starter.js'></script>
@endsection
