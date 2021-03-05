# HW
# Files from tonights class have been uploaded to dropbox (screencast where it always goes, code files to a new directory called files) and code pushed to Github.
# See attached instructions that document more or less what we went through in class to set up Git. Going forward, you will be expected to submit your homework by pushing it to your repository on Github that I will then clone to my local machine.

# For homework:
# Set up git on your machine and your homework repository on Github if you didn't get that finished during class (don't forget to send me a link!)
# Write a Python script to print out the times tables from 1 to 10. (1,2,3, etc... 2,4,6, etc.. 3,6,9, etc..)
# Write a guess the number game. Computer picks a number and asks user to guess it. User keeps trying until they get it right.
# Extra credit to tell the user if they guessed to low or to high. Also extra credit to handle bad input from the user (e.g non numeric characters).

# You can hard code the picked number - or import the random module (like we imported the math module) and use random.randint to get a random number, e,g,
# random.randint(1, 101) # pick a number between 1 and 100

# We didn't actually write a while loop in class, we ran out of time, but its pretty much what you would expect:
# while condition: #e.g. while x != y or while True
#     # do something ...
#     # eventually make condition == False so we drop out of while - or do a break to drop out
# else:
#     # just like for, while has an else if while finished  with no break hit

# You will probably want to use a while loop to control the game flow.

# 1.
for i in range(1, 11):
    print()
    for j in range(1, 11):
        print(i * j, ' ', end='')

# 2.
import random, math
random_number = math.floor(random.random() * 10)
guess_number = -1
while guess_number != random_number:
    input_number_str = input('Guess a number from 0-10: ')
    
    if not input_number_str.isnumeric():
        print('Invalid Number. Guess Again! \N{rolling on the floor laughing}')
        continue

    guess_number = int(input_number_str)
    
    if guess_number == random_number:
        print('You guessed it! \N{grinning face}')
    elif guess_number > random_number:
        print('Too high! \N{winking face}')
    elif guess_number < random_number:
        print('Too low! \N{winking face}')
    else:
        print('Guess Again! \N{rolling on the floor laughing}')
    
print(random_number)
print(guess_number)