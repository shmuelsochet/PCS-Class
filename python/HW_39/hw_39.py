# Write a function that prints out how many days are in each month, Jan -> 31, Feb -> 28 (don't worry about leap year),
# etc.... Write this function in 3 different ways:
# Using 2 lists, 1 with month names, and one with month days,
# where each month name and corresponding number of days is at the same index in each list
# Same as above but using tuples instead of lists
# Using a dictionary where the key value pairs are names -> days in month.
# I dont thin we did this in class, but you can iterate through all the keys in a dictionary. e.g:
# for k in my_dictionary:
#     print(k)
#
# will print out every key in the dictionary

# Write a function that takes the name of a month as an argument and returns the number of days in the month.

# Write a bank account class. Class should have account holders name, account #, and balance.
# Write an __init__ method (constructor) as well as methods for getting and setting the account variables.
# Also write code to keep track of how many Bank Accounts have been created,
# i.e have a non instance (class) variable that keeps the count of constructed accounts,
# and increment it by one each time an account is created. Include a class (non instance) method to get this number.

def days_in_month(month: str):
    lower_month = month.lower()
    if lower_month in ['january', 'march', 'may', 'july', 'august', 'october', 'december']:
        return 31
    elif lower_month in ['april', 'june', 'september', 'november']:
        return 30
    elif lower_month == 'february':
        return 28
    else:
        return 'Invalid Month'


def days_in_month_lists(month: str):
    months = ['january', 'february', 'march', 'april',
              'may', 'june', 'july', 'august', 'september',
              'october', 'november', 'december']
    days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
    try:
        index = months.index(month.lower())
        return f'{month.title()} {days[index]}'
    except ValueError as e:
        return f'Invalid Month: {e}'


def days_in_month_tuples(month: str):
    months = ('january', 'february', 'march', 'april',
              'may', 'june', 'july', 'august', 'september',
              'october', 'november', 'december')
    days = (31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31)
    try:
        index = months.index(month.lower())
        return f'{month.title()} {days[index]}'
    except ValueError as e:
        return f'Invalid Month: {e}'


def days_in_month_dict(month: str):
    months_days = {
        'january': 31,
        'february': 28,
        'march': 31,
        'april': 30,
        'may': 31,
        'june': 30,
        'july': 31,
        'august': 31,
        'september': 30,
        'october': 31,
        'november': 30,
        'december': 31
    }
    try:
        return f'{month.title()} {months_days[month.lower()]}'
    except KeyError as e:
        return f'Invalid Month: {e}'


print(days_in_month('january'))
print(days_in_month('february'))
print(days_in_month('hi'))

print(days_in_month_lists('january'))
print(days_in_month_lists('february'))
print(days_in_month_lists('hi'))

print(days_in_month_tuples('january'))
print(days_in_month_tuples('february'))
print(days_in_month_tuples('hi'))

print(days_in_month_dict('january'))
print(days_in_month_dict('february'))
print(days_in_month_dict('hi'))
