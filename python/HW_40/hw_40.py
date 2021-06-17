# For homework, as discussed in class, implement a selection sort in Python. 

# Apparently you already did this as an assignment during the Java portion of the course so this should be mostly review and practicing Python. 
# Still as a reminder, and as quickly discussed in class, the basic algorithm is as follows:
# divide the list into 2 parts - sorted and unsorted (where divide means keep track of the position 
# where the sorted portion ends and the unsorted portion begins - not actually create two separate lists)
# Find the smallest item in the unsorted part and swap it with the item at the first position in the unsorted portion of the list. 
# Move the boundary between the sorted and unsorted portions, one element to the right
# Keep doing this until there are no more unsorted elements.
# We will review in class as well.

# If you have time please do the following additional assignment:
# Create a "die" class (FYI a die is the singular of dice). The class should allow the developer to decide how many sides it should have when creating it. 
# Normal dice have 6 sides, but there are some games with weirdly shaped dice that have more sides, 
# The die should have a method "roll" that when rolled picks a random number between 1 and the number of sides so a 6 sided dice retuirns a number between 1 and 6, 
# a 12 sided die between 1 and 12
# Since 6 sided dice are so common, make a subclass SixSidedDie that always has 6 sides.

from random import randint


unsorted_list = [3, 5, 10, 6, 9, 11, 3]

for sorted_slot in range(len(unsorted_list)):

    min_index = sorted_slot
    for unsorted_slot in range(sorted_slot + 1, len(unsorted_list)):

        if unsorted_list[min_index] > unsorted_list[unsorted_slot]: 
            min_index = unsorted_slot

    unsorted_list[min_index], unsorted_list[sorted_slot] = unsorted_list[sorted_slot], unsorted_list[min_index]

print('after', unsorted_list)


class Die:
    def __init__(self, number_of_sides):
        self.number_of_sides = number_of_sides

    def roll(self):
        return randint(1, self.number_of_sides)

    def __str__(self):
        return f'Die with {self.number_of_sides} sides.'

class SixSidedDie(Die):
    def __init__(self):
        super().__init__(6)


three_sided_die = Die(3)

print(three_sided_die)

print(three_sided_die.roll())

six_sided_die = SixSidedDie()

print(six_sided_die)

print(six_sided_die.roll())