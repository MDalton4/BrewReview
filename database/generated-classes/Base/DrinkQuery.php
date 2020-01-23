<?php

namespace Base;

use \Drink as ChildDrink;
use \DrinkQuery as ChildDrinkQuery;
use \Exception;
use \PDO;
use Map\DrinkTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'drink' table.
 *
 *
 *
 * @method     ChildDrinkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDrinkQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildDrinkQuery orderByPicture($order = Criteria::ASC) Order by the picture column
 * @method     ChildDrinkQuery orderByCompanyId($order = Criteria::ASC) Order by the company_id column
 * @method     ChildDrinkQuery orderByStyleName($order = Criteria::ASC) Order by the style_name column
 *
 * @method     ChildDrinkQuery groupById() Group by the id column
 * @method     ChildDrinkQuery groupByName() Group by the name column
 * @method     ChildDrinkQuery groupByPicture() Group by the picture column
 * @method     ChildDrinkQuery groupByCompanyId() Group by the company_id column
 * @method     ChildDrinkQuery groupByStyleName() Group by the style_name column
 *
 * @method     ChildDrinkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDrinkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDrinkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDrinkQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDrinkQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDrinkQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDrinkQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method     ChildDrinkQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method     ChildDrinkQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method     ChildDrinkQuery joinWithCompany($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Company relation
 *
 * @method     ChildDrinkQuery leftJoinWithCompany() Adds a LEFT JOIN clause and with to the query using the Company relation
 * @method     ChildDrinkQuery rightJoinWithCompany() Adds a RIGHT JOIN clause and with to the query using the Company relation
 * @method     ChildDrinkQuery innerJoinWithCompany() Adds a INNER JOIN clause and with to the query using the Company relation
 *
 * @method     ChildDrinkQuery leftJoinStyle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Style relation
 * @method     ChildDrinkQuery rightJoinStyle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Style relation
 * @method     ChildDrinkQuery innerJoinStyle($relationAlias = null) Adds a INNER JOIN clause to the query using the Style relation
 *
 * @method     ChildDrinkQuery joinWithStyle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Style relation
 *
 * @method     ChildDrinkQuery leftJoinWithStyle() Adds a LEFT JOIN clause and with to the query using the Style relation
 * @method     ChildDrinkQuery rightJoinWithStyle() Adds a RIGHT JOIN clause and with to the query using the Style relation
 * @method     ChildDrinkQuery innerJoinWithStyle() Adds a INNER JOIN clause and with to the query using the Style relation
 *
 * @method     ChildDrinkQuery leftJoinReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the Review relation
 * @method     ChildDrinkQuery rightJoinReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Review relation
 * @method     ChildDrinkQuery innerJoinReview($relationAlias = null) Adds a INNER JOIN clause to the query using the Review relation
 *
 * @method     ChildDrinkQuery joinWithReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Review relation
 *
 * @method     ChildDrinkQuery leftJoinWithReview() Adds a LEFT JOIN clause and with to the query using the Review relation
 * @method     ChildDrinkQuery rightJoinWithReview() Adds a RIGHT JOIN clause and with to the query using the Review relation
 * @method     ChildDrinkQuery innerJoinWithReview() Adds a INNER JOIN clause and with to the query using the Review relation
 *
 * @method     ChildDrinkQuery leftJoinWishlist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Wishlist relation
 * @method     ChildDrinkQuery rightJoinWishlist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Wishlist relation
 * @method     ChildDrinkQuery innerJoinWishlist($relationAlias = null) Adds a INNER JOIN clause to the query using the Wishlist relation
 *
 * @method     ChildDrinkQuery joinWithWishlist($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Wishlist relation
 *
 * @method     ChildDrinkQuery leftJoinWithWishlist() Adds a LEFT JOIN clause and with to the query using the Wishlist relation
 * @method     ChildDrinkQuery rightJoinWithWishlist() Adds a RIGHT JOIN clause and with to the query using the Wishlist relation
 * @method     ChildDrinkQuery innerJoinWithWishlist() Adds a INNER JOIN clause and with to the query using the Wishlist relation
 *
 * @method     \CompanyQuery|\StyleQuery|\ReviewQuery|\WishlistQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDrink findOne(ConnectionInterface $con = null) Return the first ChildDrink matching the query
 * @method     ChildDrink findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDrink matching the query, or a new ChildDrink object populated from the query conditions when no match is found
 *
 * @method     ChildDrink findOneById(int $id) Return the first ChildDrink filtered by the id column
 * @method     ChildDrink findOneByName(string $name) Return the first ChildDrink filtered by the name column
 * @method     ChildDrink findOneByPicture(resource $picture) Return the first ChildDrink filtered by the picture column
 * @method     ChildDrink findOneByCompanyId(int $company_id) Return the first ChildDrink filtered by the company_id column
 * @method     ChildDrink findOneByStyleName(string $style_name) Return the first ChildDrink filtered by the style_name column *

 * @method     ChildDrink requirePk($key, ConnectionInterface $con = null) Return the ChildDrink by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDrink requireOne(ConnectionInterface $con = null) Return the first ChildDrink matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDrink requireOneById(int $id) Return the first ChildDrink filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDrink requireOneByName(string $name) Return the first ChildDrink filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDrink requireOneByPicture(resource $picture) Return the first ChildDrink filtered by the picture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDrink requireOneByCompanyId(int $company_id) Return the first ChildDrink filtered by the company_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDrink requireOneByStyleName(string $style_name) Return the first ChildDrink filtered by the style_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDrink[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDrink objects based on current ModelCriteria
 * @method     ChildDrink[]|ObjectCollection findById(int $id) Return ChildDrink objects filtered by the id column
 * @method     ChildDrink[]|ObjectCollection findByName(string $name) Return ChildDrink objects filtered by the name column
 * @method     ChildDrink[]|ObjectCollection findByPicture(resource $picture) Return ChildDrink objects filtered by the picture column
 * @method     ChildDrink[]|ObjectCollection findByCompanyId(int $company_id) Return ChildDrink objects filtered by the company_id column
 * @method     ChildDrink[]|ObjectCollection findByStyleName(string $style_name) Return ChildDrink objects filtered by the style_name column
 * @method     ChildDrink[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DrinkQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DrinkQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'socialmedia', $modelName = '\\Drink', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDrinkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDrinkQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDrinkQuery) {
            return $criteria;
        }
        $query = new ChildDrinkQuery();
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
     * @return ChildDrink|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DrinkTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DrinkTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDrink A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, picture, company_id, style_name FROM drink WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDrink $obj */
            $obj = new ChildDrink();
            $obj->hydrate($row);
            DrinkTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildDrink|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DrinkTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DrinkTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DrinkTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DrinkTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DrinkTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DrinkTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the picture column
     *
     * @param     mixed $picture The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function filterByPicture($picture = null, $comparison = null)
    {

        return $this->addUsingAlias(DrinkTableMap::COL_PICTURE, $picture, $comparison);
    }

    /**
     * Filter the query on the company_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyId(1234); // WHERE company_id = 1234
     * $query->filterByCompanyId(array(12, 34)); // WHERE company_id IN (12, 34)
     * $query->filterByCompanyId(array('min' => 12)); // WHERE company_id > 12
     * </code>
     *
     * @see       filterByCompany()
     *
     * @param     mixed $companyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function filterByCompanyId($companyId = null, $comparison = null)
    {
        if (is_array($companyId)) {
            $useMinMax = false;
            if (isset($companyId['min'])) {
                $this->addUsingAlias(DrinkTableMap::COL_COMPANY_ID, $companyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($companyId['max'])) {
                $this->addUsingAlias(DrinkTableMap::COL_COMPANY_ID, $companyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DrinkTableMap::COL_COMPANY_ID, $companyId, $comparison);
    }

    /**
     * Filter the query on the style_name column
     *
     * Example usage:
     * <code>
     * $query->filterByStyleName('fooValue');   // WHERE style_name = 'fooValue'
     * $query->filterByStyleName('%fooValue%', Criteria::LIKE); // WHERE style_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $styleName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function filterByStyleName($styleName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($styleName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DrinkTableMap::COL_STYLE_NAME, $styleName, $comparison);
    }

    /**
     * Filter the query by a related \Company object
     *
     * @param \Company|ObjectCollection $company The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDrinkQuery The current query, for fluid interface
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof \Company) {
            return $this
                ->addUsingAlias(DrinkTableMap::COL_COMPANY_ID, $company->getId(), $comparison);
        } elseif ($company instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DrinkTableMap::COL_COMPANY_ID, $company->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCompany() only accepts arguments of type \Company or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Company relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function joinCompany($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Company');

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
            $this->addJoinObject($join, 'Company');
        }

        return $this;
    }

    /**
     * Use the Company relation Company object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CompanyQuery A secondary query class using the current class as primary query
     */
    public function useCompanyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompany($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Company', '\CompanyQuery');
    }

    /**
     * Filter the query by a related \Style object
     *
     * @param \Style|ObjectCollection $style The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDrinkQuery The current query, for fluid interface
     */
    public function filterByStyle($style, $comparison = null)
    {
        if ($style instanceof \Style) {
            return $this
                ->addUsingAlias(DrinkTableMap::COL_STYLE_NAME, $style->getStyle(), $comparison);
        } elseif ($style instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DrinkTableMap::COL_STYLE_NAME, $style->toKeyValue('PrimaryKey', 'Style'), $comparison);
        } else {
            throw new PropelException('filterByStyle() only accepts arguments of type \Style or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Style relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function joinStyle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Style');

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
            $this->addJoinObject($join, 'Style');
        }

        return $this;
    }

    /**
     * Use the Style relation Style object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \StyleQuery A secondary query class using the current class as primary query
     */
    public function useStyleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStyle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Style', '\StyleQuery');
    }

    /**
     * Filter the query by a related \Review object
     *
     * @param \Review|ObjectCollection $review the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDrinkQuery The current query, for fluid interface
     */
    public function filterByReview($review, $comparison = null)
    {
        if ($review instanceof \Review) {
            return $this
                ->addUsingAlias(DrinkTableMap::COL_ID, $review->getDrinkId(), $comparison);
        } elseif ($review instanceof ObjectCollection) {
            return $this
                ->useReviewQuery()
                ->filterByPrimaryKeys($review->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByReview() only accepts arguments of type \Review or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Review relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function joinReview($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Review');

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
            $this->addJoinObject($join, 'Review');
        }

        return $this;
    }

    /**
     * Use the Review relation Review object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ReviewQuery A secondary query class using the current class as primary query
     */
    public function useReviewQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinReview($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Review', '\ReviewQuery');
    }

    /**
     * Filter the query by a related \Wishlist object
     *
     * @param \Wishlist|ObjectCollection $wishlist the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDrinkQuery The current query, for fluid interface
     */
    public function filterByWishlist($wishlist, $comparison = null)
    {
        if ($wishlist instanceof \Wishlist) {
            return $this
                ->addUsingAlias(DrinkTableMap::COL_ID, $wishlist->getDrinkId(), $comparison);
        } elseif ($wishlist instanceof ObjectCollection) {
            return $this
                ->useWishlistQuery()
                ->filterByPrimaryKeys($wishlist->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByWishlist() only accepts arguments of type \Wishlist or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Wishlist relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function joinWishlist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Wishlist');

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
            $this->addJoinObject($join, 'Wishlist');
        }

        return $this;
    }

    /**
     * Use the Wishlist relation Wishlist object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \WishlistQuery A secondary query class using the current class as primary query
     */
    public function useWishlistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWishlist($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Wishlist', '\WishlistQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDrink $drink Object to remove from the list of results
     *
     * @return $this|ChildDrinkQuery The current query, for fluid interface
     */
    public function prune($drink = null)
    {
        if ($drink) {
            $this->addUsingAlias(DrinkTableMap::COL_ID, $drink->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the drink table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DrinkTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DrinkTableMap::clearInstancePool();
            DrinkTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DrinkTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DrinkTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DrinkTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DrinkTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DrinkQuery
