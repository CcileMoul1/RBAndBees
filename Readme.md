# RBAndBees

- [App presentation](#app-presentation)
	- [Overview](#overview)
	- [Detailed description, definition of the use cases](#Detailed description) 
- [How to](#how-to)
- [ToDo list](#ToDo-list)
- [Choices](#choices)

## [App presentation]

### [Overview]

An Airbnb-like app, but for bees *i.e.* an app where logged-in users can rent real estate properties or offer properties for rent.

This app is a technical test for an intership. As it's my first Laravel project and because I learnt through an online course presenting how to create a rent-properties-app,  I decided to go further than the initial instructions.

Fell free to comment on any aspect of this in order for me to strengthen my learning.

### [Detailed description]
List of use cases of the website.

1. A not-logged user can 
	- see the properties in a carroussel format
	- click on one property to see its summary (no information about availability)
	- sign-up or sign-in

## [How to]

## [ToDo list]
	- [ ] create the tables/models of the database
		- [ ] Property
			- [x] Model 
			- [x] Migration
			- [ ] Controller
			- [x] Factory
			- [ ] Tests
		- [ ] Booking
		- [ ] PropertyVerification

## [Choices]
Property has the following attributs
	- id
	- name (string)
	- description (longText)
	- price (decimal, 10 digits including 2 after the decimal point) price per night
	- capacity (integer) capacity in term of beddings
	- owner_id foreign key, indicating who the property belongs to.
	- validated (boolean) is the property submission validated or not. Repetitive with PropertyVerficiation, but it simplifies the request and as it's a boolean, it does not take a lot of memory.
	Property could have other information, such as where it is but I decide to let it this way for now.
	
	Constraints : the price is positive but could be 0 (free) and the capacity is strictely positive.
	Added on the DB because it's the baseground of the app.
	

