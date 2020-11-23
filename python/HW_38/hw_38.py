# HW
# 1.
for i in range(1, 11):
    print()
    for j in range(1, 11):
        print(i * j, ' ', end='')


# 2.
import random, math
randon_number = math.floor(random.random() * 10)
print(math.floor(randon_number * 10))
guess_number = -1
while guess_number != randon_number:
    guess_number = int(input('Guess a number from 0-10: '))
    if guess_number == randon_number:
        print('You guessed it!')
print(randon_number)
print(guess_number)