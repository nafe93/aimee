<?php

namespace App\Repositories;

use App\Contracts\Repositories\GithubRepository as GithubRepositoryContract;
use GrahamCampbell\GitHub\GitHubManager;

class GithubRepository implements GithubRepositoryContract
{
    /**
     * @var GitHubManager
     */
    protected $github;

    const REPO_NAME = '';
    const GITHUB_HANDLE = '';

    /**
     * Initialize the Controller with necessary arguments
     *
     * @param GitHubManager $github
     */
    public function __construct(GitHubManager $github)
    {
        $this->github = $github;
    }

    /**
     * @return mixed
     */
    public function getRepoDetails()
    {
        return $this->github->connection('alternative')->repos()->show(self::GITHUB_HANDLE, self::REPO_NAME);
    }

}
