# Early attempt at the logic for the entry form to build a profile on Pintglass platform

bar_name = input('name of bar: ')
location = input('location: ')
founded = int(input('founded in (year): '))

garden = input('beer garden? ')
food = input('food? ')
dog_friendly = input('dog friendly? ')
family_friendly = input('family friendly? ')

print('The',bar_name,', located in', location,' was founded in',founded)
print('-----'*10)
print('beer garden?\t\t', garden)
print('food?\t\t', food)
print('beer garden?\t\t', dog_friendly)
print('family friendly?\t\t', family_friendly)

