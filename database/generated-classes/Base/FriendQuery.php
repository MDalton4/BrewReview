<?php

namespace Base;

use \Friend as ChildFriend;
use \FriendQuery as ChildFriendQuery;
use \Exception;
use Map\FriendTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'friend' table.
 *
 *
 *
 * @method     ChildFriendQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildFriendQuery orderByFriendUsername($order = Criteria::ASC) Order by the friend_username column
 *
 * @method     ChildFriendQuery groupByUsername() Group by the username column
 * @method     ChildFriendQuery groupByFriendUsername() Group by the friend_username column
 *
 * @method     ChildFriendQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFriendQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFriendQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFriendQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFriendQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFriendQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFriendQuery leftJoinUserRelatedByUsername($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUsername relation
 * @method     ChildFriendQuery rightJoinUserRelatedByUsername($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUsername relation
 * @method     ChildFriendQuery innerJoinUserRelatedByUsername($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUsername relation
 *
 * @method     ChildFriendQuery joinWithUserRelatedByUsername($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UserRelatedByUsername relation
 *
 * @method     ChildFriendQuery leftJoinWithUserRelatedByUsername() Adds a LEFT JOIN clause and with to the query using the UserRelatedByUsername relation
 * @method     ChildFriendQuery rightJoinWithUserRelatedByUsername() Adds a RIGHT JOIN clause and with to the query using the UserRelatedByUsername relation
 * @method     ChildFriendQuery innerJoinWithUserRelatedByUsername() Adds a INNER JOIN clause and with to the query using the UserRelatedByUsername relation
 *
 * @method     ChildFriendQuery leftJoinFriend_User($relationAlias = null) Adds a LEFT JOIN clause to the query using the Friend_User relation
 * @method     ChildFriendQuery rightJoinFriend_User($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Friend_User relation
 * @method     ChildFriendQuery innerJoinFriend_User($relationAlias = null) Adds a INNER JOIN clause to the query using the Friend_User relation
 *
 * @method     ChildFriendQuery joinWithFriend_User($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Friend_User relation
 *
 * @method     ChildFriendQuery leftJoinWithFriend_User() Adds a LEFT JOIN clause and with to the query using the Friend_User relation
 * @method     ChildFriendQuery rightJoinWithFriend_User() Adds a RIGHT JOIN clause and with to the query using the Friend_User relation
 * @method     ChildFriendQuery innerJoinWithFriend_User() Adds a INNER JOIN clause and with to the query using the Friend_User relation
 *
 * @method     \UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFriend findOne(ConnectionInterface $con = null) Return the first ChildFriend matching the query
 * @method     ChildFriend findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFriend matching the query, or a new ChildFriend object populated from the query conditions when no match is found
 *
 * @method     ChildFriend findOneByUsername(string $username) Return the first ChildFriend filtered by the username column
 * @method     ChildFriend findOneByFriendUsername(string $friend_username) Return the first ChildFriend filtered by the friend_username column *

 * @method     ChildFriend requirePk($key, ConnectionInterface $con = null) Return the ChildFriend by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFriend requireOne(ConnectionInterface $con = null) Return the first ChildFriend matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFriend requireOneByUsername(string $username) Return the first ChildFriend filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFriend requireOneByFriendUsername(string $friend_username) Return the first ChildFriend filtered by the friend_username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFriend[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFriend objects based on current ModelCriteria
 * @method     ChildFriend[]|ObjectCollection findByUsername(string $username) Return ChildFriend objects filtered by the username column
 * @method     ChildFriend[]|ObjectCollection findByFriendUsername(string $friend_username) Return ChildFriend objects filtered by the friend_username column
 * @method     ChildFriend[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FriendQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FriendQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'socialmedia', $modelName = '\\Friend', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFriendQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFriendQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFriendQuery) {
            return $criteria;
        }
        $query = new ChildFriendQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildFriend|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Friend object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Friend object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildFriendQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Friend object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFriendQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Friend object has no primary key');
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFriendQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FriendTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the friend_username column
     *
     * Example usage:
     * <code>
     * $query->filterByFriendUsername('fooValue');   // WHERE friend_username = 'fooValue'
     * $query->filterByFriendUsername('%fooValue%', Criteria::LIKE); // WHERE friend_username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $friendUsername The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFriendQuery The current query, for fluid interface
     */
    public function filterByFriendUsername($friendUsername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($friendUsername)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FriendTableMap::COL_FRIEND_USERNAME, $friendUsername, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFriendQuery The current query, for fluid interface
     */
    public function filterByUserRelatedByUsername($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(FriendTableMap::COL_USERNAME, $user->getUsername(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FriendTableMap::COL_USERNAME, $user->toKeyValue('PrimaryKey', 'Username'), $comparison);
        } else {
            throw new PropelException('filterByUserRelatedByUsername() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserRelatedByUsername relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFriendQuery The current query, for fluid interface
     */
    public function joinUserRelatedByUsername($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserRelatedByUsername');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UserRelatedByUsername');
        }

        return $this;
    }

    /**
     * Use the UserRelatedByUsername relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserRelatedByUsernameQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUserRelatedByUsername($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserRelatedByUsername', '\UserQuery');
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFriendQuery The current query, for fluid interface
     */
    public function filterByFriend_User($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(FriendTableMap::COL_FRIEND_USERNAME, $user->getUsername(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FriendTableMap::COL_FRIEND_USERNAME, $user->toKeyValue('PrimaryKey', 'Username'), $comparison);
        } else {
            throw new PropelException('filterByFriend_User() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Friend_User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFriendQuery The current query, for fluid interface
     */
    public function joinFriend_User($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Friend_User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Friend_User');
        }

        return $this;
    }

    /**
     * Use the Friend_User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useFriend_UserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFriend_User($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Friend_User', '\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFriend $friend Object to remove from the list of results
     *
     * @return $this|ChildFriendQuery The current query, for fluid interface
     */
    public function prune($friend = null)
    {
        if ($friend) {
            throw new LogicException('Friend object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the friend table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FriendTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FriendTableMap::clearInstancePool();
            FriendTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FriendTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FriendTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FriendTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FriendTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FriendQuery
