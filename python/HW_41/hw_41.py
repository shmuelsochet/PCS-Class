# Write a guess the number game where you pick the number and the computer has to guess it. 
# Computer will guess a number and you respond telling it whether its guess was correct, to low, or to high. 
# Use a binary search algorithm to allow the computer to quickly zero in on the correct number.
# Create the following class and sublcass  (this exercise may be similar to a Java inheritance example done earlier in the year.)
# Create a Vehicle class. Allow callers to pass in a color when creating an instance which will then be set as that objects color. 
# Vehicles should also have a function "go" that takes a speed. When "go" is called, 
# vehicle should set its speed and print out that it is "now going at speed X". 
# Vehicles should also have a print method that prints their color and current speed to the console.
# Create a Plane class. Plane should extend Vehicle, 
# but plane should have its own "go" method that instead of printing "now going at speed X" should print "now FLYING at speed X".
# Create a vehicle and a plane, make them go, call their print functions. 
# Verify that both go methods print the appropriate message for the type of object. 
# Verify that print outputs the current speed and color for both objects.
# Implement "Fizz buzz" in Python. Loop through numbers from 1 to 100, For each number print out the number, 
# but if the number is evenly divisible by 3 print the word "Fizz" instead. If the number is evenly divisible by 5 print the word "Buzz" instead. 
# If the number is evenly divisible by both 3 and 5 print "Fizz Buzz" instead. See https://en.wikipedia.org/wiki/Fizz_buzz  
#  (You may have done a Fizzbuzz like example earlier in the year in Java). 
# I did a quick google search for python practice exercises and found - http://www.practicepython.org/ 
# Looks like it has some nice exercises for you to practice what we covered and even learn some new things we didn't get to.

import random, math
random_number = math.floor(random.random() * 10)
computer_guess = math.floor(random.random() * 10)
print('new game')
print(random_number)
still_guessing = True
while still_guessing:
    
    if computer_guess > random_number:
        print(f'Guess {computer_guess} is too high! \N{winking face}')
        remaing_numbers = list(range(1, computer_guess))
        print(remaing_numbers)
        median = (len(remaing_numbers) - 1) // 2
        print(median)
        print(remaing_numbers[median])
        computer_guess = remaing_numbers[median]
        print(computer_guess)
        
    elif computer_guess < random_number:
        print(f'Guess: {computer_guess} is too low! \N{winking face}')
        remaing_numbers = list(range(computer_guess + 1, 11))
        print(remaing_numbers)
        median = (len(remaing_numbers) - 1) // 2
        print(median)
        print(remaing_numbers[median])
        computer_guess = remaing_numbers[median]
        print(computer_guess)
    elif computer_guess == random_number:
        print(f'You guessed it! {computer_guess} \N{grinning face}')
        still_guessing = False
    else:
        print('Guess Again! \N{rolling on the floor laughing}')
    
    
print(random_number)
print(guess_number)

class Vehicle:
    def __init__(self, color):
        self.color = color

    def go(self, speed):
        self.speed = speed
        print(f'Now going AT speed {self.speed}.')

    def __str__(self):
        return f'Color: {self.color}. Speed: {self.speed}.'

class Plane(Vehicle):
    # def __init__(self):
    #     super().__init__(6)
    def go(self, speed):
        self.speed = speed
        print(f'Now FLYING AT speed {self.speed}.')

car = Vehicle('Silver')
car.go('75')
print(car)

plane = Plane('White')
plane.go('500')
print(plane)


for number in range(1, 101):
    if number % 3 == 0:
        print('Fizz', end='')
    if number % 5 == 0:
        print('Buzz', end='')
    if not number % 3 == 0 and not number % 5 == 0:
        print(number, end='')
    print('')
 