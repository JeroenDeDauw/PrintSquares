from itertools import islice, count

''' Python 3.x '''


def print_all(collection):
    [print(element) for element in collection]


def take(count, collection):
    return islice(collection, 0, count)


def squares_of(collection):
    return (x*x for x in collection)


class Integers:
    @staticmethod
    def all():
        return count(start=1, step=1)


print_all(take(5, squares_of(Integers.all())))
